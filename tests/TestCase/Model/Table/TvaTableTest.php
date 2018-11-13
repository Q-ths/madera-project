<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TvaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TvaTable Test Case
 */
class TvaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TvaTable
     */
    public $Tva;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tva',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('Tva') ? [] : ['className' => TvaTable::class];
        $this->Tva = TableRegistry::getTableLocator()->get('Tva', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tva);

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
