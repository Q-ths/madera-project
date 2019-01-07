<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class ProfilDroitSeed extends AbstractSeed
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
                'profil_id' => 1,
                'droit_id' =>  1,
            ],
            [
                'profil_id' => 1,
                'droit_id' =>  3,
            ],
            [
                'profil_id' => 1,
                'droit_id' =>  5,
            ],
            [
                'profil_id' => 1,
                'droit_id' =>  7,
            ],

            [
                'profil_id' => 2,
                'droit_id' =>  1,
            ],
            [
                'profil_id' => 2,
                'droit_id' =>  5,
            ],

            [
                'profil_id' => 3,
                'droit_id' =>  3,
            ],

            [
                'profil_id' => 4,
                'droit_id' =>  1,
            ],
            [
                'profil_id' => 4,
                'droit_id' =>  5,
            ],
        ];

        $table = $this->table('profil_droit');
        $table->insert($data)->save();
    }
}
