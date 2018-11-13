<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CctpTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CctpTable Test Case
 */
class CctpTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CctpTable
     */
    public $Cctp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cctp',
        'app.users',
        'app.module'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cctp') ? [] : ['className' => CctpTable::class];
        $this->Cctp = TableRegistry::getTableLocator()->get('Cctp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cctp);

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
