<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class FournisseurSeed extends AbstractSeed
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
        $data = [
            [
                'id' => null,
                'nom' => 'Thomas',
                'prenom' => 'Quentin',
                'adresse_numero' => '18',
                'adresse' => 'place du village',
                'code_postal' => '54000',
                'ville' => 'NANCY',
                'email' => 'thomas.quentin@email.fr',
                'telephone' => '0611283344',
                'user_id' => 1,
                'derniere_date_modification' =>  date('Y-m-d'),
            ],
            [
                'id' => null,
                'nom' => 'Dupond',
                'prenom' => 'Quentin',
                'adresse_numero' => '98',
                'adresse' => 'place de la commanderie',
                'code_postal' => '54000',
                'ville' => 'NANCY',
                'email' => 'quentin.dupond@email.fr',
                'telephone' => '0611221344',
                'user_id' => 1,
                'derniere_date_modification' =>  date('Y-m-d'),
            ],
            [
                'id' => null,
                'nom' => 'Dupont',
                'prenom' => 'Quentin',
                'adresse_numero' => '8',
                'adresse' => 'place carnot',
                'code_postal' => '54000',
                'ville' => 'NANCY',
                'email' => 'quentin.dupont@email.fr',
                'telephone' => '0611223744',
                'user_id' => 1,
                'derniere_date_modification' =>  date('Y-m-d'),
            ],
        ];

        $table = $this->table('fournisseur');
        $table->insert($data)->save();
    }
}
