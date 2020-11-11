<?php

use app\models\Bill;
use app\models\Category;
use kartik\grid\GridView;
use yii\helpers\Html;

//use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Conta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            [
//                'class' => '\kartik\grid\SerialColumn'
//            ],
            [
                'class' => '\kartik\grid\CheckboxColumn'
            ],
            [
                'attribute' => 'date',
                'format' => 'date',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 115px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'description',
            [
                'attribute' => 'category_id',
                'filter' => Category::getCategoryOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    return $model->category->name;
                }
            ],
            [
                'attribute' => 'type',
                'filter' => Bill::getTypeOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    return $model->getTypeText();
                }
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'pageSummary' => true,
                'attribute' => 'amount',
                'format' => 'currency',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 100px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'status',
                'filter' => Bill::getStatusOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    $labelClass = ($model->isOpened() ? 'badge-warning' : 'badge-success');
                    return '<span class="badge ' . $labelClass . '"> ' . $model->getStatusText() . '</span>';

                }
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'header' => 'Ações'
            ],
        ],
        'responsive' => true,
        'hover' => true
    ]) ?>

</div>
