<?php
namespace LinkedEntities\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use LinkedEntities\Model\Behavior\LinkableEntityBehavior;

/**
 * LinkedEntities\Model\Behavior\LinkableEntityBehavior Test Case
 */
class LinkableEntityBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \LinkedEntities\Model\Behavior\LinkableEntityBehavior
     */
    public $LinkableEntityBehavior;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->LinkableEntityBehavior = new LinkableEntityBehavior();
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
