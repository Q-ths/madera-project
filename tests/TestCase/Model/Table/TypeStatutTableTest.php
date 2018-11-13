<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeStatutTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeStatutTable Test Case
 */
class TypeStatutTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeStatutTable
     */
    public $TypeStatut;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_statut',
        'app.devis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeStatut') ? [] : ['className' => TypeStatutTable::class];
        $this->TypeStatut = TableRegistry::getTableLocator()->get('TypeStatut', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeStatut);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
