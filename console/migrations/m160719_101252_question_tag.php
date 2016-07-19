<?php

use yii\db\Migration;

class m160719_101252_question_tag extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";

        /* MYSQL */
        if (!in_array('question_tag', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%question_tag}}', [
                    'question_id' => 'INT(11) NOT NULL',
                    'tag_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    public function safeDown()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `question_tag`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
