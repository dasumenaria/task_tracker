<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterRolesTable Test Case
 */
class MasterRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterRolesTable
     */
    public $MasterRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_roles',
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
        $config = TableRegistry::exists('MasterRoles') ? [] : ['className' => MasterRolesTable::class];
        $this->MasterRoles = TableRegistry::get('MasterRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterRoles);

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
