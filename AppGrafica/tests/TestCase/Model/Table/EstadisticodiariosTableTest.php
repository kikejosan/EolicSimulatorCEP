<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadisticodiariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadisticodiariosTable Test Case
 */
class EstadisticodiariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadisticodiariosTable
     */
    public $Estadisticodiarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estadisticodiarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Estadisticodiarios') ? [] : ['className' => EstadisticodiariosTable::class];
        $this->Estadisticodiarios = TableRegistry::get('Estadisticodiarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estadisticodiarios);

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
