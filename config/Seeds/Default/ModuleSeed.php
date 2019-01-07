<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class ModuleSeed extends AbstractSeed
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
                'nom' => 'Module test 1',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 1,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 2',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 1,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 3',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 1,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 4',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 1,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],

            [
                'nom' => 'Module test 5',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 2,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 6',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 2,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 7',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 2,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 8',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 2,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],

            [
                'nom' => 'Module test 9',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 3,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 10',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 3,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 11',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 3,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 12',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 3,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],

            [
                'nom' => 'Module test 13',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 4,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 14',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 4,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 15',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 4,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'nom' => 'Module test 16',
                'marge' => floatval("" .rand(1,100) .".". (rand(0,100) / 100)),
                'gamme_id' => 4,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
        ];

        $table = $this->table('module');
        $table->insert($data)->save();

        
    }
}
