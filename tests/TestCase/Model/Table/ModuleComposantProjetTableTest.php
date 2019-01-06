<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleComposantProjetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleComposantProjetTable Test Case
 */
class ModuleComposantProjetTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleComposantProjetTable
     */
    public $ModuleComposantProjet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module_composant_projet',
        'app.users',
        'app.module_projet'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ModuleComposantProjet') ? [] : ['className' => ModuleComposantProjetTable::class];
        $this->ModuleComposantProjet = TableRegistry::getTableLocator()->get('ModuleComposantProjet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModuleComposantProjet);

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
