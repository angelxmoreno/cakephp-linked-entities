<?php
namespace LinkedEntities\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LinkedEntities Model
 *
 * @method \LinkedEntities\Model\Entity\LinkedEntity get($primaryKey, $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity newEntity($data = null, array $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity[] newEntities(array $data, array $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity[] patchEntities($entities, array $data, array $options = [])
 * @method \LinkedEntities\Model\Entity\LinkedEntity findOrCreate($search, callable $callback = null, $options = [])
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
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
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
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
