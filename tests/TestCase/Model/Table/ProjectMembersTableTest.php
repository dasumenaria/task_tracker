<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectMembersTable Test Case
 */
class ProjectMembersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectMembersTable
     */
    public $ProjectMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_members',
        'app.projects',
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
        $config = TableRegistry::exists('ProjectMembers') ? [] : ['className' => ProjectMembersTable::class];
        $this->ProjectMembers = TableRegistry::get('ProjectMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectMembers);

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
