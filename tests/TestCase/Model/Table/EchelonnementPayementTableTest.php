<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EchelonnementPayementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EchelonnementPayementTable Test Case
 */
class EchelonnementPayementTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EchelonnementPayementTable
     */
    public $EchelonnementPayement;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.echelonnement_payement',
        'app.type_echelonnement_payement',
        'app.devis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EchelonnementPayement') ? [] : ['className' => EchelonnementPayementTable::class];
        $this->EchelonnementPayement = TableRegistry::getTableLocator()->get('EchelonnementPayement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EchelonnementPayement);

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
