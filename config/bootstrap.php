<?php

use Cake\Core\Configure;
use LinkedEntities\Model\Behavior\BehaviorBase;

$defaults = [
    'links' => [],
    'link_types' => [
        'bookmark' => 1,
        'follow' => 2,
        'favorite' => 3,
        'star' => 4
    ],
    'UserModel' => 'Users.Users',
    'user_association' => [
        'className' => '{{className}}',
        'foreignKey' => 'user_id',
        'targetForeignKey' => 'foreign_key',
        'through' => 'LinkedEntities.LinkedEntities',
        'saveStrategy' => 'append',
        'conditions' => [
            'LinkedEntities.foreign_model' => '{{className}}',
            'LinkedEntities.type' => '{{linkType}}',
        ]
    ],
    'entity_association' => [
        'className' => '{{UserModel}}',
        'foreignKey' => 'foreign_key',
        'targetForeignKey' => 'user_id',
        'through' => 'LinkedEntities.LinkedEntities',
        'saveStrategy' => 'append',
        'conditions' => [
            'LinkedEntities.foreign_model' => '{{className}}',
            'LinkedEntities.type' => '{{linkType}}',
        ]
    ]
];

$config = Configure::read(BehaviorBase::PLUGIN_NAME, []);
Configure::write(BehaviorBase::PLUGIN_NAME, array_merge($defaults, $config));
