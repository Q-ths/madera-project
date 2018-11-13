<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FamilleComposantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FamilleComposantTable Test Case
 */
class FamilleComposantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FamilleComposantTable
     */
    public $FamilleComposant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.famille_composant',
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
        $config = TableRegistry::getTableLocator()->exists('FamilleComposant') ? [] : ['className' => FamilleComposantTable::class];
        $this->FamilleComposant = TableRegistry::getTableLocator()->get('FamilleComposant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FamilleComposant);

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
