<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FluctuaprodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FluctuaprodsTable Test Case
 */
class FluctuaprodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FluctuaprodsTable
     */
    public $Fluctuaprods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fluctuaprods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fluctuaprods') ? [] : ['className' => FluctuaprodsTable::class];
        $this->Fluctuaprods = TableRegistry::get('Fluctuaprods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fluctuaprods);

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
