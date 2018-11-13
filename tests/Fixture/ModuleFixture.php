<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModuleFixture
 *
 */
class ModuleFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'module';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'projet_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cctp_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gamme_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'coupe_principe_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nom' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'derniere_date_modification' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_in' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_out' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'projet_id' => ['type' => 'index', 'columns' => ['projet_id'], 'length' => []],
            'cctp_id' => ['type' => 'index', 'columns' => ['cctp_id'], 'length' => []],
            'gamme_id' => ['type' => 'index', 'columns' => ['gamme_id'], 'length' => []],
            'coupe_principe_id' => ['type' => 'index', 'columns' => ['coupe_principe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'module_ibfk_1' => ['type' => 'foreign', 'columns' => ['projet_id'], 'references' => ['projet', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
            'module_ibfk_2' => ['type' => 'foreign', 'columns' => ['cctp_id'], 'references' => ['cctp', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
            'module_ibfk_3' => ['type' => 'foreign', 'columns' => ['gamme_id'], 'references' => ['gamme', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
            'module_ibfk_4' => ['type' => 'foreign', 'columns' => ['coupe_principe_id'], 'references' => ['coupe_principe', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'projet_id' => 1,
                'cctp_id' => 1,
                'gamme_id' => 1,
                'coupe_principe_id' => 1,
                'nom' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'user_id' => 1,
                'derniere_date_modification' => '2018-11-13 10:18:39',
                'date_in' => '2018-11-13 10:18:39',
                'date_out' => '2018-11-13 10:18:39'
            ],
        ];
        parent::init();
    }
}
