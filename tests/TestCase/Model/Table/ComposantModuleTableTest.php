<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComposantModuleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComposantModuleTable Test Case
 */
class ComposantModuleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComposantModuleTable
     */
    public $ComposantModule;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.composant_module',
        'app.module',
        'app.composant'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ComposantModule') ? [] : ['className' => ComposantModuleTable::class];
        $this->ComposantModule = TableRegistry::getTableLocator()->get('ComposantModule', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ComposantModule);

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
