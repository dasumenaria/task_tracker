<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientVisitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientVisitesTable Test Case
 */
class ClientVisitesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientVisitesTable
     */
    public $ClientVisites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.client_visites',
        'app.master_clients',
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
        $config = TableRegistry::exists('ClientVisites') ? [] : ['className' => ClientVisitesTable::class];
        $this->ClientVisites = TableRegistry::get('ClientVisites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClientVisites);

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
