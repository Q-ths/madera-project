<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComposantFixture
 *
 */
class ComposantFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'composant';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'famille_composant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tva_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fournisseur_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nom' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'prix_achat' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'pourcentage_marge' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'derniere_date_modification' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_in' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_out' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'famille_composant_id' => ['type' => 'index', 'columns' => ['famille_composant_id'], 'length' => []],
            'tva_id' => ['type' => 'index', 'columns' => ['tva_id'], 'length' => []],
            'fournisseur_id' => ['type' => 'index', 'columns' => ['fournisseur_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'composant_ibfk_1' => ['type' => 'foreign', 'columns' => ['famille_composant_id'], 'references' => ['famille_composant', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'composant_ibfk_2' => ['type' => 'foreign', 'columns' => ['tva_id'], 'references' => ['tva', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'composant_ibfk_3' => ['type' => 'foreign', 'columns' => ['fournisseur_id'], 'references' => ['fournisseur', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'famille_composant_id' => 1,
                'tva_id' => 1,
                'fournisseur_id' => 1,
                'nom' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'prix_achat' => 1.5,
                'pourcentage_marge' => 1.5,
                'user_id' => 1,
                'derniere_date_modification' => '2018-11-13 10:18:31',
                'date_in' => '2018-11-13 10:18:31',
                'date_out' => '2018-11-13 10:18:31'
            ],
        ];
        parent::init();
    }
}
