<?php
namespace LinkedEntities\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LinkedEntitiesFixture
 *
 */
class LinkedEntitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'foreign_model' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'foreign_key' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'foreign_model' => ['type' => 'index', 'columns' => ['foreign_model'], 'length' => []],
            'foreign_key' => ['type' => 'index', 'columns' => ['foreign_key'], 'length' => []],
            'selected_item_type_id' => ['type' => 'index', 'columns' => ['type'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'combo' => ['type' => 'unique', 'columns' => ['user_id', 'type', 'foreign_model', 'foreign_key'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => '97cbada7-f4c4-40b5-83c5-f9f4a3ad993b',
                'user_id' => 'eee6ad89-a660-4ec2-8a57-f8f2b9a1f211',
                'type' => 1,
                'foreign_model' => 'Lorem ipsum dolor sit amet',
                'foreign_key' => 'b4b50a81-c067-48c1-8f6b-4b29c17acd8a',
                'created' => '2018-08-28 03:36:34',
                'modified' => '2018-08-28 03:36:34',
                'deleted' => '2018-08-28 03:36:34'
            ],
        ];
        parent::init();
    }
}
