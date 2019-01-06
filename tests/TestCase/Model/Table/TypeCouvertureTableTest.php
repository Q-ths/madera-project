<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeCouvertureTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeCouvertureTable Test Case
 */
class TypeCouvertureTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeCouvertureTable
     */
    public $TypeCouverture;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_couverture',
        'app.user',
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
        $config = TableRegistry::getTableLocator()->exists('TypeCouverture') ? [] : ['className' => TypeCouvertureTable::class];
        $this->TypeCouverture = TableRegistry::getTableLocator()->get('TypeCouverture', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeCouverture);

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
