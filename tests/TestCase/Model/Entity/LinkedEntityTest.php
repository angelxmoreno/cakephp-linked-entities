<?php
namespace LinkedEntities\Test\TestCase\Model\Entity;

use Cake\ORM\Entity;
use Cake\TestSuite\TestCase;
use LinkedEntities\Model\Entity\LinkedEntity;

/**
 * LinkedEntities\Model\Entity\LinkedEntity Test Case
 */
class LinkedEntityTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \LinkedEntities\Model\Entity\LinkedEntity
     */
    public $LinkedEntity;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->LinkedEntity = new LinkedEntity();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LinkedEntity);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->assertInstanceOf(Entity::class, $this->LinkedEntity);
    }
}
