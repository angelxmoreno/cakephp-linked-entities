<?php

namespace LinkedEntities\Model\Behavior;

use Cake\Core\Configure;
use Cake\ORM\Behavior;
use LinkedEntities\Helpers\ArrayTemplate;

/**
 * Class BehaviorBase
 * @package LinkedEntities\Model\Behavior
 */
abstract class BehaviorBase extends Behavior
{
    const PLUGIN_NAME = 'LinkedEntities';
    const MODEL_NAME = 'LinkedEntities';
    const MODEL_PROPERTY = 'linked_entities';
    const FULL_MODEL_NAME = self::PLUGIN_NAME . '.' . self::MODEL_NAME;
    const USER_BEHAVIOR = 'LinkableEntityUser';
    const ENTITY_BEHAVIOR = 'LinkableEntity';
    const USER_BEHAVIOR_NAME = self::PLUGIN_NAME . '.' . self::USER_BEHAVIOR;
    const ENTITY_BEHAVIOR_NAME = self::PLUGIN_NAME . '.' . self::ENTITY_BEHAVIOR;

    public function initialize(array $config_runtime)
    {
        $config_app = Configure::read(self::PLUGIN_NAME);
        $config = array_merge($config_app, $config_runtime);
        $this->setConfig($config);
    }

    protected function buildUserBelongToManyAssociationOptions(array $replacements)
    {
        return ArrayTemplate::replace($this->getConfig('user_association'), $replacements);
    }

    protected function buildEntityBelongToManyAssociationOptions(array $replacements)
    {
        $replacements['UserModel'] = $this->getConfig('UserModel');

        return ArrayTemplate::replace($this->getConfig('entity_association'), $replacements);
    }
}
