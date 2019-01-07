<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfilDroitTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfilDroitTable Test Case
 */
class ProfilDroitTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfilDroitTable
     */
    public $ProfilDroit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profil_droit',
        'app.profil',
        'app.droit'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProfilDroit') ? [] : ['className' => ProfilDroitTable::class];
        $this->ProfilDroit = TableRegistry::getTableLocator()->get('ProfilDroit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProfilDroit);

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
