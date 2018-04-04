<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WindeventrsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WindeventrsTable Test Case
 */
class WindeventrsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WindeventrsTable
     */
    public $Windeventrs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.windeventrs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Windeventrs') ? [] : ['className' => WindeventrsTable::class];
        $this->Windeventrs = TableRegistry::get('Windeventrs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Windeventrs);

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
