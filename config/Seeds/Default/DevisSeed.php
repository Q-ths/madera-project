<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class DevisSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 0');

        $data = [
            [
                'id' => null,
                'projet_id' => 1,
                'type_statut_id' => 1,
                'client_nom' => 'Dupont',
                'client_prenom' => 'Bruno',
                'adresse_numero' => '18',
                'adresse' => 'place du village',
                'code_postal' => '54000',
                'ville' => 'NANCY',
                'pourcentage_remise' => 0,
                'prix_total_ttc' => 230000,
                'prix_total_ht' => 200000,
                'user_id' => 1,
                'derniere_date_modification' => date('Y-m-d'),
            ],
        ];

        $table = $this->table('devis');
        $table->insert($data)->save();

    }
}
