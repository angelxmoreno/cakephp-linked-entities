<?php

namespace LinkedEntities\Test\TestCase\Model\Behavior;

use LinkedEntities\Model\Behavior\BehaviorBase;
use LinkedEntities\TestSuite\TestCase;

/**
 * LinkedEntities\Model\Behavior\BehaviorBase Test Case
 */
class BehaviorBaseTest extends TestCase
{

    /**
     *
     * @var BehaviorBase | \PHPUnit_Framework_MockObject_MockObject
     */
    public $BehaviorBase;

    public function setUp()
    {
        parent::setUp();

        $this->BehaviorBase = $this->getMockForAbstractClass(
            BehaviorBase::class,
            [$this->UsersTable, $this->behavior_config]
        );
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
     * Test tests initialize method properly merges config data
     *
     * @return void
     */
    public function testInitializeProperlyMergesConfigData()
    {
        $passed_link_data = $this->behavior_config['links'];
        $original_user_model = $this->default_config['UserModel'];

        $this->assertSame($passed_link_data, $this->BehaviorBase->getConfig('links'));
        $this->assertNotSame($original_user_model, $this->BehaviorBase->getConfig('UserModel'));
    }
}
