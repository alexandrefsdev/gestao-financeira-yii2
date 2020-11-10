<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Bill[] $bills
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 60],
        ];
    }
    // Para preencher com o timestamp as
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                // COMO JÁ VEM COMO PADRÃO, NÃO É NECESSARIO
//                'createdAtAttribute' => 'create_at',
//                'updatedAtAttribute' => 'update_at',
                'value' => new Expression('CURRENT_TIMESTAMP')
            ],
        ];
        // BLAMEABLEBEHAVIOR, DIZ QUEM ALTEROU A COLUNA
        // SLUGABLE,
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
        ];
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['category_id' => 'id']);
    }
}
