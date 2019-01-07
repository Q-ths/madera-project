<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class DroitSeed extends AbstractSeed
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
                'nom' => "Autorisé",
                'valeur' =>  0,
                'application_module_id' => 1
            ],
            [
                'nom' => "Non autorisé",
                'valeur' =>  1,
                'application_module_id' => 1
            ],

            [
                'nom' => "Autorisé",
                'valeur' =>  0,
                'application_module_id' => 2
            ],
            [
                'nom' => "Non autorisé",
                'valeur' =>  1,
                'application_module_id' => 2
            ],

            [
                'nom' => "Autorisé",
                'valeur' =>  0,
                'application_module_id' => 3
            ],
            [
                'nom' => "Non autorisé",
                'valeur' =>  1,
                'application_module_id' => 3
            ],

            [
                'nom' => "Autorisé",
                'valeur' =>  0,
                'application_module_id' => 4
            ],
            [
                'nom' => "Non autorisé",
                'valeur' =>  1,
                'application_module_id' => 4
            ],
        ];

        $table = $this->table('droit');
        $table->insert($data)->save();
    }
}
