<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificacionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificacionsTable Test Case
 */
class NotificacionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificacionsTable
     */
    public $Notificacions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notificacions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notificacions') ? [] : ['className' => NotificacionsTable::class];
        $this->Notificacions = TableRegistry::get('Notificacions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notificacions);

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
