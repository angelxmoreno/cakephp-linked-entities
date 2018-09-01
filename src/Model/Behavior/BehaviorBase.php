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
    public function initialize(array $config_runtime)
    {
        $config_app = Configure::read('LinkedEntities');
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
