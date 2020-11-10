<?php

use app\models\Bill;
use app\models\Category;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Button;


/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\bootstrap4\ActiveForm; */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'offset' => 'offset-sm-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(Category::getCategoryOptions(), [
        'prompt' => ':: Selecione ::'
    ]) ?>

    <?= $form->field($model, 'type')->dropDownList(Bill::getTypeOptions(), [
        'prompt' => ':: Selecione ::'
    ]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(Bill::getStatusOptions(), [
        'prompt' => ':: Selecione ::'
    ]) ?>

    <div class="form-group">
        <?= Button::widget([
            'label' => 'Salvar',
            'options' => [
                'class' => 'btn btn-outline-warning',
                'style' => [
                    'float' => 'right'
                ]
            ],
        ]); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
