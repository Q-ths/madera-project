<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleTable Test Case
 */
class ModuleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleTable
     */
    public $Module;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module',
        'app.gamme',
        'app.users',
        'app.composant',
        'app.projet'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Module') ? [] : ['className' => ModuleTable::class];
        $this->Module = TableRegistry::getTableLocator()->get('Module', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Module);

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
