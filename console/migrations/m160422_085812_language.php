<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_085812_Language extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $this->createTable('{{%language}}',
                [
                    'id' => Schema::TYPE_PK . " COMMENT 'Language ID'",
                    'name' => Schema::TYPE_STRING . "(100) COMMENT 'Language name'",
                    'version' => Schema::TYPE_STRING . "(100) COMMENT 'Version'",
                    'url' => Schema::TYPE_STRING . "(500) COMMENT 'Official page'",
                ], $tableOptions);

            $transaction->commit();
        } catch (Exception $e) {
            echo 'Catch Exception ' . $e->getMessage() . ' and rollBack this';
            $transaction->rollBack();
        }
    }

    public function safeDown()
    {
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $this->dropTable('{{%language}}');
            $transaction->commit();
        } catch (Exception $e) {
            echo 'Catch Exception ' . $e->getMessage() . ' and rollBack this';
            $transaction->rollBack();
        }
    }
}
