<?php
namespace LinkedEntities\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * LinkableEntity behavior
 */
class LinkableEntityBehavior extends BehaviorBase
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->associateToUser();
    }

    public function associateToUser()
    {
        $links = $this->getConfig('links');
        $table = $this->getTable();

        foreach ($links as $link) {
            $modelAlias = $link['name'];
            $association_options = $this->buildEntityBelongToManyAssociationOptions($link);
            $table->belongsToMany($modelAlias, $association_options);
        }
    }
}
