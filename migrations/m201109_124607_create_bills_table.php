<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%bills}}`.
 */
class m201109_124607_create_bills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bills}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'type' => $this->smallInteger(1)->notNull(), // 1 - Receber | 2 - Pagar
            'date' => $this->date()->notNull(),
            'description' => $this->string(60)->notNull(),
            'amount' => $this->decimal(10,2)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        $this->addForeignKey('fk_bills_category_id', '{{%bills}}', 'category_id','{{%categories}}' ,'id');

        // Populando o BD
        $dataAtual = new Expression('CURRENT_TIMESTAMP');
        $this->batchInsert('{{%bills}}',
            ['category_id','type', 'date', 'description', 'amount', 'created_at'], [
                // Salário
                [6, 1, '2020-11-05', 'Salário', 3000, $dataAtual],
                [6, 1, '2020-11-01', 'Salário Esposa', 3000, $dataAtual],

                // Cartão de Crédito
                [1,2, '2020-11-07', 'Joystick do Xbox One', -250, $dataAtual],
                [1,2, '2020-11-08', 'Monitor Ultrawide 29 polegadas', -990, $dataAtual],
                [1,2, '2020-11-08', 'Mouse Gamer', -78.90, $dataAtual],

                // Lazer
                [2,2, '2020-11-10', 'Academia MR Brothers', -70, $dataAtual],
                [2,2, '2020-11-10', 'Netflix', -21.90, $dataAtual],

                // Moradia
                [3,2, '2020-11-15', 'Condominio', -850, $dataAtual],

                // Supermercado
                [4,2, '2020-11-12', 'Compras da quinzena', -224.54 , $dataAtual],

                // Veículo
                [5,2, '2020-11-14', 'Troca de óleo', -89.90, $dataAtual],
                [5,2, '2020-11-14', 'Combustível', -172.30, $dataAtual],
                [5,2, '2020-11-14', 'Lava Jato', -42.90, $dataAtual],
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_bills_category_id', '{{%bills}}');
        $this->dropTable('{{%bills}}');
    }
}
