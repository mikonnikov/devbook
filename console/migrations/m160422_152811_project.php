<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_152811_project extends Migration
{
    public function safeUp()
    {
        $tables = $this->db->schema->getTableNames();

        if (!in_array('project', $tables)) {
            $tableOptions = 'ENGINE=InnoDB';

            $this->createTable(
                '{{%project}}',
                [
                    'id'        => Schema::TYPE_PK . " COMMENT 'Project ID'",
                    'name'      => Schema::TYPE_STRING . "(255) NOT NULL COMMENT 'Project name'",
                    'descr'     => Schema::TYPE_TEXT . " COMMENT 'Description'",
                    'url'       => Schema::TYPE_STRING . "(200)",
                    'url_dev'   => Schema::TYPE_STRING . "(200)",
                    'url_prod'  => Schema::TYPE_STRING . "(200)",
                ],
                $tableOptions
            );

            $this->createIndex('project_name_uindex', '{{%project}}', 'name', 1);
        }
    }

    public function safeDown()
    {
        $tables = $this->db->schema->getTableNames();

        if (in_array('project', $tables)) {
            $this->dropIndex('project_name_uindex', '{{%project}}');
            $this->dropTable('{{%project}}');
        }
    }
}
