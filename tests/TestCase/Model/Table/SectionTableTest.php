<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectionTable Test Case
 */
class SectionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionTable
     */
    public $Section;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.section',
        'app.module',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Section') ? [] : ['className' => SectionTable::class];
        $this->Section = TableRegistry::getTableLocator()->get('Section', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Section);

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
