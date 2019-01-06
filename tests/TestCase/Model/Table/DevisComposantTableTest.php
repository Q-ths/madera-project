<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevisComposantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevisComposantTable Test Case
 */
class DevisComposantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DevisComposantTable
     */
    public $DevisComposant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.devis_composant',
        'app.devis_module'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DevisComposant') ? [] : ['className' => DevisComposantTable::class];
        $this->DevisComposant = TableRegistry::getTableLocator()->get('DevisComposant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DevisComposant);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
