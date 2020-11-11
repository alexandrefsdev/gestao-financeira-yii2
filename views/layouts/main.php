<?php

/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Nav;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?php echo Nav::widget([
    'options' => ['class' => 'nav nav-tabs'], // set this to nav-tab to get tab-styled navigation
    'activateParents' => true,
    'items' => [
        [
            'label' => 'Home',
            'url' => ['site/index'],
            'linkOptions' => [
                'class' => 'nav-link active'
            ],

        ],
        [
            'label' => 'Ações',
            'items' => [
                [
                    'label' => 'Lançamentos',
                    'url' => '/bills/index'
                ],
                [
                    'label' => 'Categorias',
                    'url' => '/categories/index'
                ],
                '<div class="dropdown-divider"></div>',
//                '<div class="dropdown-header">Dropdown Header</div>',
                [
                    'label' => 'Relatórios',
                    'url' => '/reports/index'
                ],
            ],
        ],
//        [
//            'label' => 'Login',
//            'url' => ['site/login'],
//            'visible' => Yii::$app->user->isGuest
//        ],
    ],
]);
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => 'Lançamentos', 'url' => ['/bills/index']],
//            ['label' => 'Categorias', 'url' => ['/categories/index']],
//            ['label' => 'Relatórios', 'url' => ['/reports/index']],
//        ],
//    ]);
//    NavBar::end();
?>
<div class="wrap">
    <div class="container">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

        ]) ?>
        <?= Alert::widget() ?>

        <?= $content ?>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
</body>
</html>
<?php $this->endPage() ?>
