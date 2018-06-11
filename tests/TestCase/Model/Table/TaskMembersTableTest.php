<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaskMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaskMembersTable Test Case
 */
class TaskMembersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaskMembersTable
     */
    public $TaskMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.task_members',
        'app.tasks',
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
        $config = TableRegistry::exists('TaskMembers') ? [] : ['className' => TaskMembersTable::class];
        $this->TaskMembers = TableRegistry::get('TaskMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaskMembers);

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
