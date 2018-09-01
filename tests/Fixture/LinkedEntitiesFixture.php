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
                'id' => 'c83b8bed-9d9b-41a0-a20d-cbc9d4ea36e9',
                'user_id' => 'b1572216-9ac9-42c8-97af-452f15b403e7',
                'type' => 1,
                'foreign_model' => 'Lorem ipsum dolor sit amet',
                'foreign_key' => '53d6d0fc-f2ad-4575-b31b-98e9421eb611',
                'created' => '2018-08-31 21:27:39',
                'modified' => '2018-08-31 21:27:39',
                'deleted' => '2018-08-31 21:27:39'
            ],
        ];
        parent::init();
    }
}
