<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class FinitionSeed extends AbstractSeed
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
                'nom' => 'Rêvetement sols',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Rêvetement murs',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Peinture',
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
        ];

        $table = $this->table('type_finition');
        $table->insert($data)->save();
    }
}
