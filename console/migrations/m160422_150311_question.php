<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_150311_question extends Migration
{
    public function safeUp()
    {
        $tables = $this->db->schema->getTableNames();

        if (!in_array('question', $tables)) {

            $tableOptions = 'ENGINE=InnoDB';

            $this->createTable(
                '{{%question}}',
                [
                    'id'            => Schema::TYPE_PK . " COMMENT 'ID'",
                    'title'         => Schema::TYPE_STRING . "(500) NOT NULL COMMENT 'Question title'",
                    'descr'         => Schema::TYPE_TEXT . " COMMENT 'Question text'",
                    'project_id'    => Schema::TYPE_INTEGER . "(11) COMMENT 'Related project'",
                    'category_id'   => Schema::TYPE_INTEGER . "(11) COMMENT 'Category'",
                    'language_id'   => Schema::TYPE_INTEGER . "(11) COMMENT 'Programming language'",
                    'user_id'       => Schema::TYPE_INTEGER . "(11) COMMENT 'Question author'",
                    'add_time'      => Schema::TYPE_DATETIME . " COMMENT 'Add time'",
                    'edit_time'     => Schema::TYPE_DATETIME . "",
                    'answer'        => Schema::TYPE_TEXT . " COMMENT 'Authors answer'",
                    'error'         => Schema::TYPE_TEXT . " COMMENT 'Error text'",
                    'ticket'        => Schema::TYPE_STRING . "(500) NOT NULL COMMENT 'Related ticket'",
                    'solved'        => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT 'Problem solved'",
                ],
                $tableOptions
            );

            $this->createIndex('question_id_uindex', '{{%question}}', 'id', 1);
            $this->addForeignKey('fk_question_user_id', '{{%question}}', 'user_id', 'user', 'id');
            $this->addForeignKey('fk_question_project_id', '{{%question}}', 'project_id', 'project', 'id');
            $this->addForeignKey('fk_question_category_id', '{{%question}}', 'category_id', 'category', 'id');
            $this->addForeignKey('fk_question_language_id', '{{%question}}', 'language_id', 'language', 'id');
        }
    }

    public function safeDown()
    {
        $tables = $this->db->schema->getTableNames();

        if (in_array('question', $tables)) {
            $this->dropIndex('question_id_uindex', '{{%question}}');
            $this->dropForeignKey('fk_question_user_id', '{{%question}}');
            $this->dropForeignKey('fk_question_project_id', '{{%question}}');
            $this->dropForeignKey('fk_question_category_id', '{{%question}}');
            $this->dropForeignKey('fk_question_language_id', '{{%question}}');
            $this->dropTable('{{%question}}');
        }
    }
}
