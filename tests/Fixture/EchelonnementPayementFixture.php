<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EchelonnementPayementFixture
 *
 */
class EchelonnementPayementFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'echelonnement_payement';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'type_echelonnement_payement_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'devis_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'type_echelonnement_payement_id' => ['type' => 'index', 'columns' => ['type_echelonnement_payement_id'], 'length' => []],
            'devis_id' => ['type' => 'index', 'columns' => ['devis_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'echelonnement_payement_ibfk_1' => ['type' => 'foreign', 'columns' => ['type_echelonnement_payement_id'], 'references' => ['type_echelonnement_payement', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'echelonnement_payement_ibfk_2' => ['type' => 'foreign', 'columns' => ['devis_id'], 'references' => ['devis', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'type_echelonnement_payement_id' => 1,
                'devis_id' => 1
            ],
        ];
        parent::init();
    }
}
