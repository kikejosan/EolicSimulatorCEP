<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RankingprodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RankingprodsTable Test Case
 */
class RankingprodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RankingprodsTable
     */
    public $Rankingprods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rankingprods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rankingprods') ? [] : ['className' => RankingprodsTable::class];
        $this->Rankingprods = TableRegistry::get('Rankingprods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rankingprods);

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
