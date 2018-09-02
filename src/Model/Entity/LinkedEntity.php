<?php

namespace LinkedEntities\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Class LinkedEntity
 * @package LinkedEntities\Model\Entity
 *
 * @property string $id
 * @property string $user_id
 * @property int $type
 * @property string $foreign_model
 * @property string $foreign_key
 * @property FrozenTime $created
 * @property FrozenTime $modified
 * @property FrozenTime $deleted
 */
class LinkedEntity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'type' => true,
        'foreign_model' => true,
        'foreign_key' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true
    ];
}
