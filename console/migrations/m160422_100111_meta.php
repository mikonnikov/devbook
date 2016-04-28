<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_100111_meta extends Migration
{
    public function safeUp()
    {
        $tables = $this->db->schema->getTableNames();

        if (!in_array('meta', $tables)) {
            $tableOptions = 'ENGINE=InnoDB';

            $this->createTable(
                '{{%meta}}',
                [
                    'id'    => Schema::TYPE_PK . "",
                    'name'  => Schema::TYPE_STRING . "(50) NOT NULL COMMENT 'Tag name'",
                ],
                $tableOptions
            );

            $this->createIndex('meta_name_uindex', '{{%meta}}', 'name', 1);
        }
    }

    public function safeDown()
    {
        $tables = $this->db->schema->getTableNames();

        if (in_array('meta', $tables)) {
            $this->dropIndex('meta_name_uindex', '{{%meta}}');
            $this->dropTable('{{%meta}}');
        }
    }
}
