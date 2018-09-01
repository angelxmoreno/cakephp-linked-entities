<?php

namespace LinkedEntities\Model\Behavior;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

/**
 * LinkableEntityUser behavior
 */
class LinkableEntityUserBehavior extends BehaviorBase
{
    const METHOD_PREFIXES = ['add', 'remove'];
    const PLUGIN = 'LinkedEntities';
    const MODEL_NAME = 'LinkedEntities';
    const MODEL_PROPERTY = 'linked_entities';
    const FULL_MODEL_NAME = self::PLUGIN . '.' . self::MODEL_NAME;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->associateUser();
    }

    protected function associateUser()
    {
        $this->getTable()->hasMany('LinkedEntities', ['className' => self::FULL_MODEL_NAME]);

        $links = $this->getConfig('links');

        foreach ($links as $modelAlias => $linkOptions) {
            $this->associateModelAliasToUser($modelAlias, $linkOptions);
            $this->injectModelAliasMethods($modelAlias);
        }
    }

    protected function associateModelAliasToUser(string $modelAlias, array $linkOptions)
    {
        $association_options = $this->buildUserBelongToManyAssociationOptions($linkOptions);
        $this->getTable()->belongsToMany($modelAlias, $association_options);
    }

    protected function injectModelAliasMethods(string $modelAlias)
    {
        foreach (self::METHOD_PREFIXES as $prefix) {
            $method = $prefix . $modelAlias;
            $this->setConfig("implementedMethods.{$method}", $method);
        }
    }

    public function __call($name, $arguments)
    {
        $prefix = $this->getMethodPrefix($name);
        $modelAlias = str_replace($prefix, '', $name);

        if (
            in_array($prefix, self::METHOD_PREFIXES) &&
            $this->isValidAlias($modelAlias)
        ) {
            $method = $prefix . 'EntityLink';
            array_unshift($arguments, $modelAlias);
            call_user_func_array([$this, $method], $arguments);
        }
    }

    public function addEntityLink($modelAlias, Entity $user, Entity $entity)
    {
        if (!$this->isValidAlias($modelAlias)) {
            throw new \InvalidArgumentException(sprintf(
                '"%s" is not a valid LinkableEntity alias for %s',
                $modelAlias,
                $this->getTable()->getAlias()
            ));
        }

        $data = $this->buildLinkedEntity($modelAlias, $user, $entity);

        $link = $this->getTable()->{self::MODEL_NAME}->newEntity($data);
        $user->{self::MODEL_PROPERTY} = $user->{self::MODEL_PROPERTY} ?: [];
        $user->{self::MODEL_PROPERTY}[] = $link;
        $user->setAccess(self::MODEL_PROPERTY, true);
        $user->setDirty(self::MODEL_PROPERTY);
    }

    public function removeEntityLink($modelAlias, Entity $user, Entity $entity)
    {
        if (!$this->isValidAlias($modelAlias)) {
            throw new \InvalidArgumentException(sprintf(
                '"%s" is not a valid LinkableEntity alias for %s',
                $modelAlias,
                $this->getTable()->getAlias()
            ));
        }

        $table = $this->getTable()->{self::MODEL_NAME};
        $conditions = $this->buildLinkedEntity($modelAlias, $user, $entity);
        $link = $table->find()->where($conditions)->first();
        $table->delete($link);
        $user->isDirty(self::MODEL_PROPERTY);
    }

    protected function isValidAlias($modelAlias)
    {
        return in_array($modelAlias, array_keys($this->getConfig('links')));
    }

    protected function buildLinkedEntity($modelAlias, Entity $user, Entity $entity)
    {
        return [
            'user_id' => $user->get($this->getTable()->getPrimaryKey()),
            'type' => $this->getConfig("links.{$modelAlias}.linkType"),
            'foreign_model' => $this->getConfig("links.{$modelAlias}.className"),
            'foreign_key' => $entity->get($this->getTable()->{$modelAlias}->getPrimaryKey()),
        ];
    }

    protected function getMethodPrefix($method)
    {
        list($prefix) = explode('_', Inflector::tableize($method));

        return $prefix;
    }
}
