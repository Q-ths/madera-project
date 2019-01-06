<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class FamilleComposantSeed extends AbstractSeed
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
                'nom' => 'Montants en bois de chêne',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Montants en bois de sapin',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Elements de montage métallique',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ]
        ];

        $table = $this->table('famille_composant');
        $table->insert($data)->save();
    }
}
