<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaskStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaskStatusesTable Test Case
 */
class TaskStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaskStatusesTable
     */
    public $TaskStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.task_statuses',
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
        $config = TableRegistry::exists('TaskStatuses') ? [] : ['className' => TaskStatusesTable::class];
        $this->TaskStatuses = TableRegistry::get('TaskStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaskStatuses);

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
