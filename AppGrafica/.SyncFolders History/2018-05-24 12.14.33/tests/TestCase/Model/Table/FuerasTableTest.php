<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuerasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuerasTable Test Case
 */
class FuerasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FuerasTable
     */
    public $Fueras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fueras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fueras') ? [] : ['className' => FuerasTable::class];
        $this->Fueras = TableRegistry::get('Fueras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fueras);

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
