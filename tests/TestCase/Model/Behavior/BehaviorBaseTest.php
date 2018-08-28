<?php
namespace LinkedEntities\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use LinkedEntities\Model\Behavior\BehaviorBase;

/**
 * LinkedEntities\Model\Behavior\BehaviorBase Test Case
 */
class BehaviorBaseTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \LinkedEntities\Model\Behavior\BehaviorBase
     */
    public $BehaviorBase;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->BehaviorBase = new BehaviorBase();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BehaviorBase);

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
}
