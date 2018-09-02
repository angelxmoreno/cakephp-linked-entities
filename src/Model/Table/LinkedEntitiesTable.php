<?php

namespace LinkedEntities\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use LinkedEntities\Model\Entity\LinkedEntity;

/**
 * LinkedEntities Model
 *
 * @method LinkedEntity get($primaryKey, $options = [])
 * @method LinkedEntity newEntity($data = null, array $options = [])
 * @method LinkedEntity[] newEntities(array $data, array $options = [])
 * @method LinkedEntity|bool save(LinkedEntity $entity, $options = [])
 * @method LinkedEntity|bool saveOrFail(LinkedEntity $entity, $options = [])
 * @method LinkedEntity patchEntity(LinkedEntity $entity, array $data, array $options = [])
 * @method LinkedEntity[] patchEntities($entities, array $data, array $options = [])
 * @method LinkedEntity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LinkedEntitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('linked_entities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->scalar('foreign_model')
            ->maxLength('foreign_model', 100)
            ->requirePresence('foreign_model', 'create')
            ->notEmpty('foreign_model');

        $validator
            ->uuid('foreign_key')
            ->requirePresence('foreign_key', 'create')
            ->notEmpty('foreign_key');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
