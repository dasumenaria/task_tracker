<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterEmployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterEmployeesTable Test Case
 */
class MasterEmployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterEmployeesTable
     */
    public $MasterEmployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_employees',
        'app.master_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MasterEmployees') ? [] : ['className' => MasterEmployeesTable::class];
        $this->MasterEmployees = TableRegistry::get('MasterEmployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterEmployees);

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
