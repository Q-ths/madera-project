<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class ClientSeed extends AbstractSeed
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
                'nom' => 'Dupont',
                'prenom' => 'Bruno',
                'adresse_numero' => '18 ',
                'adresse' => 'place du village',
                'code_postal' => '54000',
                'ville' => 'NANCY',
                'email' => 'bruno.dupont@email.fr',
                'telephone' => '0611223344',
                'user_id' => 1,
                'derniere_date_modification' =>  date('Y-m-d'),
            ],
        ];

        $table = $this->table('client');
        $table->insert($data)->save();

//        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 1');

    }
}
