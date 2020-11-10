<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m201109_124539_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        $this->batchInsert('{{%categories}}', ['name','created_at'], [
            ['Cartão de Crédito', new Expression('CURRENT_TIMESTAMP')],
            ['Lazer', new Expression('CURRENT_TIMESTAMP')],
            ['Moradia', new Expression('CURRENT_TIMESTAMP')],
            ['Supermercado', new Expression('CURRENT_TIMESTAMP')],
            ['Veículo', new Expression('CURRENT_TIMESTAMP')],
            ['Salário', new Expression('CURRENT_TIMESTAMP')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
