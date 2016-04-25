<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_150311_question extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%question}}',
            [
                'id'            => Schema::TYPE_PK." COMMENT 'ID'",
                'title'         => Schema::TYPE_STRING."(500) NOT NULL COMMENT 'Question title'",
                'descr'         => Schema::TYPE_TEXT." COMMENT 'Question text'",
                'project_id'    => Schema::TYPE_INTEGER."(11) COMMENT 'Related project'",
                'category_id'   => Schema::TYPE_INTEGER."(11) COMMENT 'Category'",
                'language_id'   => Schema::TYPE_INTEGER."(11) COMMENT 'Programming language'",
                'user_id'       => Schema::TYPE_INTEGER."(11) COMMENT 'Question author'",
                'add_time'      => Schema::TYPE_DATETIME." COMMENT 'Add time'",
                'edit_time'     => Schema::TYPE_DATETIME."",
                'answer'        => Schema::TYPE_TEXT." COMMENT 'Authors answer'",
                'error'         => Schema::TYPE_TEXT." COMMENT 'Error text'",
            ],
            $tableOptions
        );

        $this->createIndex('question_id_uindex', '{{%question}}','id',1);
        $this->createIndex('fk_question',        '{{%question}}','project_id',0);
        $this->createIndex('fk_category',        '{{%question}}','category_id',0);
        $this->createIndex('fk_language',        '{{%question}}','language_id',0);
        $this->createIndex('fk_user',            '{{%question}}','user_id',0);
    }

    public function safeDown()
    {
        $this->dropIndex('question_id_uindex', '{{%question}}');
        $this->dropIndex('fk_question', '{{%question}}');
        $this->dropIndex('fk_category', '{{%question}}');
        $this->dropIndex('fk_language', '{{%question}}');
        $this->dropIndex('fk_user', '{{%question}}');
        $this->dropTable('{{%question}}');
    }
}
