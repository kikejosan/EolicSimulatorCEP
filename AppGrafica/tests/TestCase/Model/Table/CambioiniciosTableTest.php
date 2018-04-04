<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CambioiniciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CambioiniciosTable Test Case
 */
class CambioiniciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CambioiniciosTable
     */
    public $Cambioinicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cambioinicios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cambioinicios') ? [] : ['className' => CambioiniciosTable::class];
        $this->Cambioinicios = TableRegistry::get('Cambioinicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cambioinicios);

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
