<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User seed.
 */
class ProfilSeed extends AbstractSeed
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
                'nom' => 'Créer',
            ],
            [
                'nom' => 'En cours',
            ],
            [
                'nom' => 'Clôturer',
            ]
        ];

        $table = $this->table('type_statut');
        $table->insert($data)->save();
    }
}
