<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfilDroitFixture
 *
 */
class ProfilDroitFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'profil_droit';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'profil_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'droit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'profil_id' => ['type' => 'index', 'columns' => ['profil_id'], 'length' => []],
            'droit_id' => ['type' => 'index', 'columns' => ['droit_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'profil_droit_ibfk_1' => ['type' => 'foreign', 'columns' => ['profil_id'], 'references' => ['profil', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'profil_droit_ibfk_2' => ['type' => 'foreign', 'columns' => ['droit_id'], 'references' => ['droit', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
                'profil_id' => 1,
                'droit_id' => 1
            ],
        ];
        parent::init();
    }
}
