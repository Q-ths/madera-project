<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ElementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ElementTable Test Case
 */
class ElementTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ElementTable
     */
    public $Element;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.element',
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
        $config = TableRegistry::getTableLocator()->exists('Element') ? [] : ['className' => ElementTable::class];
        $this->Element = TableRegistry::getTableLocator()->get('Element', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Element);

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
