<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_100111_tag extends Migration
{
    public function safeUp()
    {
        $tables = $this->db->schema->getTableNames();

        if (!in_array('tag', $tables)) {
            $tableOptions = 'ENGINE=InnoDB';

            $this->createTable(
                '{{%tag}}',
                [
                    'id'        => Schema::TYPE_PK      . "",
                    'name'      => Schema::TYPE_STRING  . "(50) NOT NULL COMMENT 'Tag name'",
                    'frequency' => Schema::TYPE_INTEGER . "(11) COMMENT 'Usage frequency'",
                ],
                $tableOptions
            );

            $this->createIndex('tag_name_uindex', '{{%tag}}', 'name', 1);
        }
    }

    public function safeDown()
    {
        $tables = $this->db->schema->getTableNames();

        if (in_array('tag', $tables)) {
            $this->dropIndex('tag_name_uindex', '{{%tag}}');
            $this->dropTable('{{%tag}}');
        }
    }
}
