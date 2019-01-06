<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class IsolantSeed extends AbstractSeed
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
                'nom' => 'Laine de verre',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Parre-vapeurs',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Laine de chanvre',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Panneaux de polystyrène extrudé',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
        ];

        $table = $this->table('type_isolant');
        $table->insert($data)->save();
    }
}
