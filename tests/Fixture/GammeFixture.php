<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GammeFixture
 *
 */
class GammeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'gamme';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nom' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'type_finission_exterieur_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type_isolant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type_couverture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type_qualite_huisserie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'derniere_date_modification' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_in' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_out' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'type_finission_exterieur_id' => ['type' => 'index', 'columns' => ['type_finission_exterieur_id'], 'length' => []],
            'type_isolant_id' => ['type' => 'index', 'columns' => ['type_isolant_id'], 'length' => []],
            'type_couverture_id' => ['type' => 'index', 'columns' => ['type_couverture_id'], 'length' => []],
            'type_qualite_huisserie_id' => ['type' => 'index', 'columns' => ['type_qualite_huisserie_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'gamme_ibfk_1' => ['type' => 'foreign', 'columns' => ['type_finission_exterieur_id'], 'references' => ['type_finission_exterieur', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'gamme_ibfk_2' => ['type' => 'foreign', 'columns' => ['type_isolant_id'], 'references' => ['type_isolant', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'gamme_ibfk_3' => ['type' => 'foreign', 'columns' => ['type_couverture_id'], 'references' => ['type_couverture', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'gamme_ibfk_4' => ['type' => 'foreign', 'columns' => ['type_qualite_huisserie_id'], 'references' => ['type_qualite_huisserie', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'nom' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'type_finission_exterieur_id' => 1,
                'type_isolant_id' => 1,
                'type_couverture_id' => 1,
                'type_qualite_huisserie_id' => 1,
                'user_id' => 1,
                'derniere_date_modification' => '2018-11-13 10:18:38',
                'date_in' => '2018-11-13 10:18:38',
                'date_out' => '2018-11-13 10:18:38'
            ],
        ];
        parent::init();
    }
}
