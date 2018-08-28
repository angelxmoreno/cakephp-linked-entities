<?php
namespace LinkedEntities\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use LinkedEntities\Model\Table\LinkedEntitiesTable;

/**
 * LinkedEntities\Model\Table\LinkedEntitiesTable Test Case
 */
class LinkedEntitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \LinkedEntities\Model\Table\LinkedEntitiesTable
     */
    public $LinkedEntities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.linked_entities.linked_entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LinkedEntities') ? [] : ['className' => LinkedEntitiesTable::class];
        $this->LinkedEntities = TableRegistry::getTableLocator()->get('LinkedEntities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LinkedEntities);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
