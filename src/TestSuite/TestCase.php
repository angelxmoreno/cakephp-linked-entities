<?php

namespace LinkedEntities\TestSuite;

use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase as CakeTestCase;
use LinkedEntities\Model\Behavior\BehaviorBase;
use LinkedEntities\Model\Table\LinkedEntitiesTable;

/**
 * Class TestCase
 * @package LinkedEntities\TestSuite
 */
class TestCase extends CakeTestCase
{
    /**
     * Fixtures to load.
     *
     * @var array
     */
    public $fixtures = [
        'plugin.LinkedEntities.users',
        'plugin.LinkedEntities.linked_entities',
    ];

    /**
     * @var Table
     */
    protected $UsersTable;

    /**
     * @var LinkedEntitiesTable
     */
    protected $LinkedEntitiesTable;

    /**
     * @var
     */
    protected $default_config;

    /**
     * @var array
     */
    protected $behavior_config = [
        'UserModel' => 'Users',
        'link_types' => [
            'bookmark' => 1,
            'follow' => 2,
            'favorite' => 3,
            'star' => 4
        ],
        'links' => [
            'StarredProjects' => [
                'name' => 'UserStars',
                'className' => 'Projects',
                'linkType' => 4
            ],
            'FollowedProjects' => [
                'name' => 'Followers',
                'className' => 'Projects',
                'linkType' => 2
            ]
        ]
    ];

    public function setUp()
    {
        parent::setUp();

        $this->default_config = Configure::read(BehaviorBase::PLUGIN_NAME);
        $this->UsersTable = TableRegistry::getTableLocator()->get('Users');
        $this->LinkedEntitiesTable = TableRegistry::getTableLocator()->get('Users');
    }

    public function tearDown()
    {
        unset($this->default_config);
        unset($this->UsersTable);
        unset($this->LinkedEntitiesTable);

        parent::tearDown();
    }
}
