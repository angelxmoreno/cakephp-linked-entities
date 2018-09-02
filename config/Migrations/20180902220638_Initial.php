<?php

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('linked_entities', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid', [
                'default' => '',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('user_id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('type', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('foreign_model', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'uuid', [
                'default' => '',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                    'type',
                    'foreign_model',
                    'foreign_key',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'foreign_model',
                ]
            )
            ->addIndex(
                [
                    'foreign_key',
                ]
            )
            ->addIndex(
                [
                    'type',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

    }

    public function down()
    {
        $this->table('linked_entities')->drop()->save();
    }
}
