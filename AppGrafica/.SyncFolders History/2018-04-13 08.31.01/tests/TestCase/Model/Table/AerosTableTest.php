<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AerosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AerosTable Test Case
 */
class AerosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AerosTable
     */
    public $Aeros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aeros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Aeros') ? [] : ['className' => AerosTable::class];
        $this->Aeros = TableRegistry::get('Aeros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aeros);

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
