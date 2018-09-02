<?php

namespace LinkedEntities\Test\TestCase\Model\Behavior;

use LinkedEntities\Model\Behavior\BehaviorBase;
use LinkedEntities\Model\Behavior\LinkableEntityUserBehavior;
use LinkedEntities\TestSuite\TestCase;

/**
 * Class LinkableEntityUserBehaviorTest
 * @package LinkedEntities\Test\TestCase\Model\Behavior
 */
class LinkableEntityUserBehaviorTest extends TestCase
{
    /**
     * @var LinkableEntityUserBehavior
     */
    public $LinkableEntityUserBehavior;

    public function setUp()
    {
        parent::setUp();
        $this->UsersTable->addBehavior(BehaviorBase::USER_BEHAVIOR_NAME, $this->behavior_config);
        $this->LinkableEntityUserBehavior = $this->UsersTable->getBehavior(BehaviorBase::USER_BEHAVIOR);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LinkableEntityUserBehavior);
        parent::tearDown();
    }

    /**
     * Test __call method
     *
     * @return void
     */
    public function testCall()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test addEntityLink method
     *
     * @return void
     */
    public function testAddEntityLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test removeEntityLink method
     *
     * @return void
     */
    public function testRemoveEntityLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
