<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Gestão Financeira Pessoal';
?>

<div class="site-index">
    <div class="jumbotron">
        <h1>Gestão Financeira Pessoal</h1>
        <p class="lead">Organização de suas finanças pessoais</p>
        <p>
            <?= Html::a('<i class="glyphicon glyphicon-plus-sign"></i> Criar um lançamento',"#", [
                'title' => 'Criar um lançamento agora',
                'class' => 'btn btn-lg btn-success'
            ]) ?>
        </p>
        <p>
            <?= Html::a('Ver Relatórios', "../reports/index", [
                'title' => 'Ver meus relatórios',
                'class' => 'btn btn-sm btn-link'
            ]) ?>
        </p>
    </div>
</div>

