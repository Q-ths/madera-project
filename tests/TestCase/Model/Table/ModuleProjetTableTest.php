<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleProjetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleProjetTable Test Case
 */
class ModuleProjetTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleProjetTable
     */
    public $ModuleProjet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module_projet',
        'app.users',
        'app.devis',
        'app.module_composant_projet'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ModuleProjet') ? [] : ['className' => ModuleProjetTable::class];
        $this->ModuleProjet = TableRegistry::getTableLocator()->get('ModuleProjet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModuleProjet);

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
