<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PepitosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PepitosTable Test Case
 */
class PepitosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PepitosTable
     */
    public $Pepitos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pepitos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pepitos') ? [] : ['className' => PepitosTable::class];
        $this->Pepitos = TableRegistry::get('Pepitos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pepitos);

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
