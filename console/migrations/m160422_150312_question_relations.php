<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_150312_Question_Relations extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey('fk_question_user_id', '{{%question}}', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_question_project_id', '{{%question}}', 'project_id', 'project', 'id');
        $this->addForeignKey('fk_question_category_id', '{{%question}}', 'category_id', 'category', 'id');
        $this->addForeignKey('fk_question_language_id', '{{%question}}', 'language_id', 'language', 'id');
    }

    public function safeDown()
    {

        $this->dropForeignKey('fk_question_user_id', '{{%question}}');
        $this->dropForeignKey('fk_question_project_id', '{{%question}}');
        $this->dropForeignKey('fk_question_category_id', '{{%question}}');
        $this->dropForeignKey('fk_question_language_id', '{{%question}}');
    }
}
