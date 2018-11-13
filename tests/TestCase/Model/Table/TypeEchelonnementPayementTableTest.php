<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeEchelonnementPayementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeEchelonnementPayementTable Test Case
 */
class TypeEchelonnementPayementTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeEchelonnementPayementTable
     */
    public $TypeEchelonnementPayement;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_echelonnement_payement',
        'app.echelonnement_payement'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeEchelonnementPayement') ? [] : ['className' => TypeEchelonnementPayementTable::class];
        $this->TypeEchelonnementPayement = TableRegistry::getTableLocator()->get('TypeEchelonnementPayement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeEchelonnementPayement);

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
}
