<?php

namespace LinkedEntities\Model\Behavior;

use Cake\Core\Configure;
use Cake\ORM\Behavior;

/**
 * Class BehaviorBase
 * @package LinkedEntities\Model\Behavior
 */
class BehaviorBase extends Behavior
{
    public function initialize(array $config)
    {
        $config = Configure::read('LinkedEntities');
        $this->setConfig($config);
    }

    protected function buildUserBelongToManyAssociationOptions(array $replacements)
    {
        return $this->replaceArrayTemplate($replacements, $this->getConfig('user_association'));
    }

    protected function buildEntityBelongToManyAssociationOptions(array $replacements)
    {
        $replacements['UserModel'] = $this->getConfig('UserModel');

        return $this->replaceArrayTemplate($replacements, $this->getConfig('entity_association'));
    }

    protected function replaceArrayTemplate(array $replacements, array $data)
    {
        $json = json_encode($data);
        foreach ($replacements as $key => $val) {
            $json = str_replace("{{{$key}}}", $val, $json);
        }

        return json_decode($json, true);
    }
}
