<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FournisseurTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FournisseurTable Test Case
 */
class FournisseurTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FournisseurTable
     */
    public $Fournisseur;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fournisseur',
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
        $config = TableRegistry::getTableLocator()->exists('Fournisseur') ? [] : ['className' => FournisseurTable::class];
        $this->Fournisseur = TableRegistry::getTableLocator()->get('Fournisseur', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fournisseur);

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
