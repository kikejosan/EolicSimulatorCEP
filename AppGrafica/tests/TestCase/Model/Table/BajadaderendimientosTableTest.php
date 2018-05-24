<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BajadaderendimientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BajadaderendimientosTable Test Case
 */
class BajadaderendimientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BajadaderendimientosTable
     */
    public $Bajadaderendimientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bajadaderendimientos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bajadaderendimientos') ? [] : ['className' => BajadaderendimientosTable::class];
        $this->Bajadaderendimientos = TableRegistry::get('Bajadaderendimientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bajadaderendimientos);

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
