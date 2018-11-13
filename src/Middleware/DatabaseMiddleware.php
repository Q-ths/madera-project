<?php
/**
 *
 * DatabaseMiddleware
 *
 * Surcouche permettant de vérifier que les bases de données nécessaire sont présentes et de les créer dans le cas échéant
 *
 * @example https://book.cakephp.org/3.0/fr/controllers/middleware.html
 *
 * @package App\Middleware
 *
 * @version 1.0.0
 * @author Quentin THOMAS <thomas.happiso@gmail.com>
 * @copyright 2018 HAPPISO
 */

namespace App\Middleware;

use Cake\Database\Connection;
use Cake\Datasource\ConnectionInterface;
use Cake\Datasource\ConnectionManager;
use Cake\Datasource\Exception\MissingDatasourceConfigException;
use Cake\Datasource\Exception\RecordNotFoundException;

use Migrations\Migrations;

class DatabaseMiddleware
{

    CONST FOREIGN_KEY_CHECKS_ACTIVATED = 1;
    CONST FOREIGN_KEY_CHECKS_DISABLED = 0;

    /** @var array $_Connections Noms des connexions */
    private $_Connections;

    /** @var  \Cake\Datasource\ConnectionInterface $_ConnectionInterface Connexion courante */
    private $_ConnectionInterface;

    /** @var  \Cake\Database\Connection $_DatabaseConnection */
    private $_DatabaseConnection;

    /** @var  array $_CurrentConfig s*/
    private $_CurrentConfig;

    /** @var  Migrations\Migrations $_Migration */
    private $_Migration;

    /** @var array $_CurrentMigrations Tableau des status des migrations */
    private $_CurrentMigrations;

    /** @var string $_CurrentConnection Nom de la connexion courante */
    private $_CurrentConnection;

    public function __construct(array $connections = null)
    {
        if($connections == null)
            $connections = ['default'];

        $this->_Connections = $connections;
    }

    /**
     * @param $request
     * @param $response
     * @param $next
     * @return mixed
     */
    public function __invoke($request, $response, $next)
    {
        $response = $next($request,$response);

        foreach ($this->_Connections as $connection) {

            $this->_CurrentConnection = $connection;
            $this->_initializeDatabaseConnection();

            /*
             * Si la connexion est à false : Base de données non éxistante
             */
            if(!$this->_isConnected())
            {
                try
                {
                    /*
                     * Création de la base de données
                     * Modification de la base de données pour correspondre au bon encodage
                     */
                    $this->_DatabaseConnection->query('CREATE DATABASE IF NOT EXISTS ' . $this->_CurrentConfig['database']);
                    $this->_DatabaseConnection->query('ALTER DATABASE ' . $this->_CurrentConfig['database'] . ' CHARACTER SET utf8 COLLATE utf8_general_ci');
                    $this->_initializeMigrations();
                    /*
                     * Application des migrations
                     * Application des seeds
                     */
                    $migrations = new Migrations(['connection' => $connection]);
                    $migrate = $migrations->migrate(['source' => 'Migrations/Creation/' . ucfirst($connection)]);
                    $seed = $migrations->seed(['source' => 'Seeds/Creation/' . ucfirst($connection)]);
                }
                catch (RecordNotFoundException $e)
                {
                    debug($e->getMessage());
                    return;
                }
            }
            else
            {
                $this->_initializeMigrations();

                /** @var Array $res */
                $res = $this->_ConnectionInterface
                    ->execute("  SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '{$this->_CurrentConfig['database']}' AND TABLE_NAME != 'phinxlog'")
                    ->fetchAll('assoc');

                /*
                 * Formatage du nom pour correspondre au nom de la table sur moteur MySQL
                 * exemple : nom_de_ma_table
                 */
                array_walk($this->_CurrentMigrations, function(&$array, $key) {
                    $array['formattedName'] = str_replace('create_','',strtolower(preg_replace('/\B([A-Z])/', '_$1', $array['name'])));
                });

                /*
                 * Récupération du dernier index du tableau dans le but de récupérer les noms formatés
                 * Récupération du dernier index du tableau dans le but de récupérer les noms de migrations
                 */
                $res = array_map('end', $res);
                $migrationsStatutName = array_map('end', $this->_CurrentMigrations);

                /*
                 * Trier les noms par ordre alphabétique
                 */
                sort($migrationsStatutName,SORT_STRING);

                /*
                 * On cherche si une ou plusieurs tables sont manquantes
                 */
                if(count(array_diff($migrationsStatutName,$res)) > 0) {
                    /** @var Array $diff */
                    $diff = array_diff($migrationsStatutName,$res);

                    /*
                     * Boucle sur les différentes tables manquantes
                     */
                    /** @var string $table */
                    foreach ($diff as $table)
                    {
                        /*
                         * Récupération de l'index par rapport aux tableau.
                         * Cet index permettra de pouvoir naviguer de façon précise sur le tableau
                         */
                        $index = array_search($table,array_column($this->_CurrentMigrations,'formattedName'));

                        /*
                         * Récupération de l'id de la migration
                         * Récupération du nom de la migration pour correspondre à un éventuel Seed
                         */
                        /** @var integer $idMigration */
                        $idMigration = $this->_CurrentMigrations[$index]['id'];
                        /** @var string $seedName */
                        $seedName = str_replace('Create','',$this->_CurrentMigrations[$index]['name']).'Seed';

                        /*
                         * Application de la migration
                         */
                        $this->_Migration->migrate(['target' => $idMigration]);

                        /*
                         * Si le seed de la migration éxiste, on l'applique
                         */
                        if(file_exists(CONFIG . 'Seeds/Creation/' . ucfirst($connection) . '/' . $seedName. 'php'))
                            $this->_Migration->seed(['source' => 'Seeds/Creation/' . ucfirst($connection), 'seed' => $seedName]);
                    }
                }

            }
            /*
             * Réactivation des vérifications des clés étrangères
             */
            $this->_enableForeignKeyChecks();
        }

        return $response;
    }

    /**
     * is Connected
     *
     * Donne l'état de connexion selon la configuration envoyé
     *
     * @param $connection
     * @return bool
     */
    private function _isConnected() : bool
    {
        $this->_ConnectionInterface = $this->_getConnection($this->_CurrentConnection);
        return (bool)$this->_ConnectionInterface->getDriver()->isConnected();
    }

    /**
     * Get connection
     *
     * Récupre la connexion selon la config envoyé
     *
     * @param string $connection
     * @return ConnectionInterface
     * @throws MissingDatasourceConfigException
     */
    private function _getConnection() : \Cake\Datasource\ConnectionInterface
    {
        return ConnectionManager::get($this->_CurrentConnection);
    }

    /**
     * GetConfigFromConnection
     *
     * Retourne la configuration d'une connection
     *
     * @param $config
     * @return array
     */
    private function _getConfigFromConnection($config) : array
    {
        return ConnectionManager::getConfig($config);
    }

    /**
     * DisableForeignKeyChecks
     *
     * Désactive la vérification des clés étrangères
     *
     * @return void
     */
    private function _disableForeignKeyChecks() : void
    {
        $this->_DatabaseConnection->query('SET GLOBAL FOREIGN_KEY_CHECKS=' . DatabaseMiddleware::FOREIGN_KEY_CHECKS_DISABLED);
    }

    /**
     * EnableForeignKeyChecks
     *
     * Active la vérification des clés étrangères
     *
     * @return void
     */
    private function _enableForeignKeyChecks() : void
    {
        $this->_DatabaseConnection->query('SET GLOBAL FOREIGN_KEY_CHECKS=' . DatabaseMiddleware::FOREIGN_KEY_CHECKS_ACTIVATED);
    }

    /**
     * InitializeDatabaseConnection
     *
     * Initialise la connexion à la base de données manuellement
     *
     * @return void
     */
    private function _initializeDatabaseConnection()
    {
        $this->_CurrentConfig = $this->_getConfigFromConnection($this->_CurrentConnection);
        $this->_DatabaseConnection = new Connection(
            ConnectionManager::parseDsn('mysql://'.$this->_CurrentConfig["username"].':'.$this->_CurrentConfig["password"].'@'.$this->_CurrentConfig["host"].'/')
        );
        $this->_disableForeignKeyChecks();
    }

    /**
     * InitializeMigrations
     *
     * Initalise les différentes ressources nécessaire aux migrations
     *
     * @return void
     */
    private function _initializeMigrations()
    {
        $this->_Migration = $migrations = new Migrations(['connection' => $this->_CurrentConnection]);
        $this->_CurrentMigrations = $migrations->status(['source' => 'Migrations/Creation/' . ucfirst($this->_CurrentConnection)]);
    }

}