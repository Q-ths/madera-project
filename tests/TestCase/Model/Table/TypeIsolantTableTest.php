<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeIsolantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeIsolantTable Test Case
 */
class TypeIsolantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeIsolantTable
     */
    public $TypeIsolant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_isolant',
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
        $config = TableRegistry::getTableLocator()->exists('TypeIsolant') ? [] : ['className' => TypeIsolantTable::class];
        $this->TypeIsolant = TableRegistry::getTableLocator()->get('TypeIsolant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeIsolant);

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
