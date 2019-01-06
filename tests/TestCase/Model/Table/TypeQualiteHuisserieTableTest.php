<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeQualiteHuisserieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeQualiteHuisserieTable Test Case
 */
class TypeQualiteHuisserieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeQualiteHuisserieTable
     */
    public $TypeQualiteHuisserie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_qualite_huisserie',
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
        $config = TableRegistry::getTableLocator()->exists('TypeQualiteHuisserieController') ? [] : ['className' => TypeQualiteHuisserieTable::class];
        $this->TypeQualiteHuisserie = TableRegistry::getTableLocator()->get('TypeQualiteHuisserieController', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeQualiteHuisserie);

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
