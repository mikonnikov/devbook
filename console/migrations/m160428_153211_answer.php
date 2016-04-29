<?php

use yii\db\Schema;
use yii\db\Migration;

class m160428_153211_answer extends Migration
{
    public function safeUp()
    {
        $tables = $this->db->schema->getTableNames();

        if (!in_array('answer', $tables)) {
            $tableOptions = 'ENGINE=InnoDB';

            $this->createTable(
                '{{%answer}}',
                [
                    'id'        => Schema::TYPE_PK       . " COMMENT 'Answer ID'",
                    'title'     => Schema::TYPE_STRING   . "(500) COMMENT 'Title'",
                    'descr'     => Schema::TYPE_TEXT     . " NOT NULL COMMENT 'Answer text'",
                    'user_id'   => Schema::TYPE_INTEGER  . "(11) COMMENT 'Author'",
                    'add_time'  => Schema::TYPE_DATETIME . " COMMENT 'Answer time'",
                    'ref_url'   => Schema::TYPE_STRING   . "(500) COMMENT 'Reference URL'",
                ],
                $tableOptions
            );

            $this->createIndex('answer_id_uindex',          '{{%answer}}', 'id', 1);
            $this->addForeignKey('fk_answer_question_id',   '{{%answer}}', 'question_id',   'question', 'id');
            $this->addForeignKey('fk_answer_user_id',       '{{%answer}}', 'user_id',       'user',     'id');
        }
    }

    public function safeDown()
    {
        $tables = $this->db->schema->getTableNames();

        if (in_array('answer', $tables)) {
            $this->dropIndex('answer_id_uindex',            '{{%answer}}');
            $this->dropForeignKey('fk_answer_question_id',  '{{%answer}}');
            $this->dropForeignKey('fk_answer_user_id',      '{{%answer}}');
            $this->dropTable('{{%answer}}');
        }
    }
}
