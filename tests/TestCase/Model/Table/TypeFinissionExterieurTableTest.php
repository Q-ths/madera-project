<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeFinissionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeFinissionExterieurTable Test Case
 */
class TypeFinissionExterieurTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeFinissionTable
     */
    public $TypeFinissionExterieur;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_finission_exterieur',
        'app.user',
        'app.gamme'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeFinissionExterieur') ? [] : ['className' => TypeFinissionTable::class];
        $this->TypeFinissionExterieur = TableRegistry::getTableLocator()->get('TypeFinissionExterieur', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeFinissionExterieur);

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
