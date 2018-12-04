<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserTable Test Case
 */
class UserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserTable
     */
    public $User;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user',
        'app.cctp',
        'app.client',
        'app.composant',
        'app.coupe_principe',
        'app.devis',
        'app.famille_composant',
        'app.fournisseur',
        'app.gamme',
        'app.module',
        'app.projet',
        'app.section',
        'app.tva',
        'app.type_couverture',
        'app.type_finission_exterieur',
        'app.type_isolant',
        'app.type_qualite_huisserie'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('User') ? [] : ['className' => UserTable::class];
        $this->User = TableRegistry::getTableLocator()->get('User', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->User);

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
