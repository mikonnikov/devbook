<?php

use yii\db\Migration;

class m160719_100757_user extends Migration
{
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";

        /* MYSQL */
        if (!in_array('answer', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%answer}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(500) NULL',
                    'descr' => 'TEXT NOT NULL',
                    'user_id' => 'INT(11) NULL',
                    'add_time' => 'DATETIME NULL',
                    'ref_url' => 'VARCHAR(500) NULL',
                    'question_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        if (!in_array('user', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'username' => 'VARCHAR(255) NOT NULL',
                    'auth_key' => 'VARCHAR(32) NOT NULL',
                    'password_hash' => 'VARCHAR(255) NOT NULL',
                    'password_reset_token' => 'VARCHAR(255) NULL',
                    'email' => 'VARCHAR(255) NOT NULL',
                    'status' => 'SMALLINT(6) NOT NULL DEFAULT \'10\'',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    'rating' => 'INT(11) NOT NULL DEFAULT \'0\'',
                ], $tableOptions_mysql);
            }
        }

        $this->createIndex('idx_user_id_6789_05', 'question', 'user_id', 0);
        $this->createIndex('idx_UNIQUE_name_7013_06', 'tag', 'name', 1);
        $this->createIndex('idx_UNIQUE_username_7158_07', 'user', 'username', 1);
        $this->createIndex('idx_UNIQUE_email_7158_08', 'user', 'email', 1);
        $this->createIndex('idx_UNIQUE_password_reset_token_7158_09', 'user', 'password_reset_token', 1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_user_6664_04', '{{%question}}', 'user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION');
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function safeDown()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
