<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjetTable Test Case
 */
class ProjetTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjetTable
     */
    public $Projet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projet',
        'app.client',
        'app.users',
        'app.devis',
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
        $config = TableRegistry::getTableLocator()->exists('Projet') ? [] : ['className' => ProjetTable::class];
        $this->Projet = TableRegistry::getTableLocator()->get('Projet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Projet);

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
