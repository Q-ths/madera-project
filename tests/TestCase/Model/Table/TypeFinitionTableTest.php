<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeFinitionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeFinitionTable Test Case
 */
class TypeFinitionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeFinitionTable
     */
    public $TypeFinition;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_finition',
        'app.users',
        'app.gamme'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeFinition') ? [] : ['className' => TypeFinitionTable::class];
        $this->TypeFinition = TableRegistry::getTableLocator()->get('TypeFinition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeFinition);

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
