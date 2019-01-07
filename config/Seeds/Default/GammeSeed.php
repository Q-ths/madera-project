<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class GammeSeed extends AbstractSeed
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
                'nom' => 'Gamme test',
                'type_finition_id' => 1,
                'type_isolant_id' => 1,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Gamme test 2',
                'type_finition_id' => 1,
                'type_isolant_id' => 2,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Gamme test 3',
                'type_finition_id' => 2,
                'type_isolant_id' => 3,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Gamme test 4',
                'type_finition_id' => 3,
                'type_isolant_id' => 1,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
        ];

        $table = $this->table('gamme');
        $table->insert($data)->save();
    }
}
