<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterClientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterClientsTable Test Case
 */
class MasterClientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterClientsTable
     */
    public $MasterClients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_clients',
        'app.client_visites',
        'app.master_client_pocs',
        'app.projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MasterClients') ? [] : ['className' => MasterClientsTable::class];
        $this->MasterClients = TableRegistry::get('MasterClients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterClients);

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
