<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransicionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransicionsTable Test Case
 */
class TransicionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransicionsTable
     */
    public $Transicions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transicions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Transicions') ? [] : ['className' => TransicionsTable::class];
        $this->Transicions = TableRegistry::get('Transicions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transicions);

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
