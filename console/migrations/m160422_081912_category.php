<?php

use yii\db\Schema;
use yii\db\Migration;

class m160422_081912_Category extends Migration
{
    public function safeUp()
    {
        $tables = $this->db->schema->getTableNames();

        if (!in_array('category', $tables)) {

            $tableOptions = 'ENGINE=InnoDB';
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();

            try {
                $this->createTable('{{%category}}',
                    [
                        'id'        => Schema::TYPE_PK . " COMMENT 'Category ID'",
                        'name'      => Schema::TYPE_STRING . "(500) NOT NULL COMMENT 'Category name'",
                        'parent_id' => Schema::TYPE_INTEGER . "(11) COMMENT 'Parent category'",
                    ], $tableOptions);

                $this->createIndex('parent_id', '{{%category}}', 'parent_id', 0);
                $this->addForeignKey('fk_category_parent_id', '{{%category}}', 'parent_id', 'category', 'id');
                $transaction->commit();
            } catch (Exception $e) {
                echo 'Catch Exception ' . $e->getMessage() . ' and rollBack this';
                $transaction->rollBack();
            }
        }
    }

    public function safeDown()
    {
        $tables = $this->db->schema->getTableNames();

        if (in_array('category', $tables)) {

            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();

            try {
                $this->dropForeignKey('fk_category_parent_id', '{{%category}}');
                $this->dropTable('{{%category}}');
                $transaction->commit();
            } catch (Exception $e) {
                echo 'Catch Exception ' . $e->getMessage() . ' and rollBack this';
                $transaction->rollBack();
            }
        }
    }
}
