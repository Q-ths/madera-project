<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DroitTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DroitTable Test Case
 */
class DroitTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DroitTable
     */
    public $Droit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.droit',
        'app.profil'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Droit') ? [] : ['className' => DroitTable::class];
        $this->Droit = TableRegistry::getTableLocator()->get('Droit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Droit);

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
