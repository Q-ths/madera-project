<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComposantModuleFixture
 *
 */
class ComposantModuleFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'composant_module';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'module_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'composant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantite' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'module_id' => ['type' => 'index', 'columns' => ['module_id'], 'length' => []],
            'composant_id' => ['type' => 'index', 'columns' => ['composant_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'composant_module_ibfk_1' => ['type' => 'foreign', 'columns' => ['module_id'], 'references' => ['module', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'composant_module_ibfk_2' => ['type' => 'foreign', 'columns' => ['composant_id'], 'references' => ['composant', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'module_id' => 1,
                'composant_id' => 1,
                'quantite' => 1
            ],
        ];
        parent::init();
    }
}
