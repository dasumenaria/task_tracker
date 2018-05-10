<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterClientPocsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterClientPocsTable Test Case
 */
class MasterClientPocsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterClientPocsTable
     */
    public $MasterClientPocs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_client_pocs',
        'app.master_clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MasterClientPocs') ? [] : ['className' => MasterClientPocsTable::class];
        $this->MasterClientPocs = TableRegistry::get('MasterClientPocs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterClientPocs);

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
