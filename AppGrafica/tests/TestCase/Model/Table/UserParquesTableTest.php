<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserParquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserParquesTable Test Case
 */
class UserParquesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserParquesTable
     */
    public $UserParques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_parques'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserParques') ? [] : ['className' => UserParquesTable::class];
        $this->UserParques = TableRegistry::get('UserParques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserParques);

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
