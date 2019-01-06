<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleComposantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleComposantTable Test Case
 */
class ModuleComposantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleComposantTable
     */
    public $ModuleComposant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module_composant',
        'app.users',
        'app.projet_module'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ModuleComposant') ? [] : ['className' => ModuleComposantTable::class];
        $this->ModuleComposant = TableRegistry::getTableLocator()->get('ModuleComposant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModuleComposant);

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
