<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GammeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GammeTable Test Case
 */
class GammeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GammeTable
     */
    public $Gamme;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gamme',
        'app.type_finission_exterieur',
        'app.type_isolant',
        'app.type_couverture',
        'app.type_qualite_huisserie',
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
        $config = TableRegistry::getTableLocator()->exists('Gamme') ? [] : ['className' => GammeTable::class];
        $this->Gamme = TableRegistry::getTableLocator()->get('Gamme', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gamme);

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
