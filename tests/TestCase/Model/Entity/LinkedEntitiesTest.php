<?php
namespace LinkedEntities\Test\TestCase\Model\Entity;

use Cake\TestSuite\TestCase;
use LinkedEntities\Model\Entity\LinkedEntities;

/**
 * LinkedEntities\Model\Entity\LinkedEntities Test Case
 */
class LinkedEntitiesTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \LinkedEntities\Model\Entity\LinkedEntities
     */
    public $LinkedEntities;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->LinkedEntities = new LinkedEntities();
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
