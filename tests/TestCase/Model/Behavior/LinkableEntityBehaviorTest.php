<?php

namespace LinkedEntities\Test\TestCase\Model\Behavior;

use LinkedEntities\Model\Behavior\BehaviorBase;
use LinkedEntities\Model\Behavior\LinkableEntityBehavior;
use LinkedEntities\TestSuite\TestCase;

/**
 * Class LinkableEntityBehaviorTest
 * @package LinkedEntities\Test\TestCase\Model\Behavior
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class LinkableEntityBehaviorTest extends TestCase
{

    /**
     * @var LinkableEntityBehavior
     */
    public $LinkableEntityBehavior;

    public function setUp()
    {
        parent::setUp();
        $this->UsersTable->addBehavior(BehaviorBase::ENTITY_BEHAVIOR_NAME, $this->behavior_config);
        $this->LinkableEntityBehavior = $this->UsersTable->getBehavior(BehaviorBase::ENTITY_BEHAVIOR);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LinkableEntityBehavior);

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
     * Test associateToUser method
     *
     * @return void
     */
    public function testAssociateToUser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
