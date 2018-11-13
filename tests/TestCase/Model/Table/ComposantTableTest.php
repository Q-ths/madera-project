<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComposantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComposantTable Test Case
 */
class ComposantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComposantTable
     */
    public $Composant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.composant',
        'app.famille_composant',
        'app.tva',
        'app.fournisseur',
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
        $config = TableRegistry::getTableLocator()->exists('Composant') ? [] : ['className' => ComposantTable::class];
        $this->Composant = TableRegistry::getTableLocator()->get('Composant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Composant);

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
