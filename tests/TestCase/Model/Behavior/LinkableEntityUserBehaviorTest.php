<?php
namespace LinkedEntities\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use LinkedEntities\Model\Behavior\LinkableEntityUserBehavior;

/**
 * LinkedEntities\Model\Behavior\LinkableEntityUserBehavior Test Case
 */
class LinkableEntityUserBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \LinkedEntities\Model\Behavior\LinkableEntityUserBehavior
     */
    public $LinkableEntityUserBehavior;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->LinkableEntityUserBehavior = new LinkableEntityUserBehavior();
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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
