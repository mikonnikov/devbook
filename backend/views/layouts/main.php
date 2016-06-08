<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<style>
.container {
    margin-left: 10px;
    margin-right: 10px;
}
</style>


<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Мультифон',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label'    => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label'    => Yii::t('app', 'Dictionaries'),
            'items' => [
                [
                    'label' => Yii::t('app', 'Categories'),
                    'url'   => ['/category']
                ],
                [
                    'label' => Yii::t('app', 'Languages'),
                    'url'   => ['/language']
                ],
                [
                    'label' => Yii::t('app', 'Projects'),
                    'url'   => ['/project']
                ],
                [
                    'label' => Yii::t('app', 'Meta tags'),
                    'url'   => ['/tag']
                ],
            ],
            //'visible'   => Yii::$app->getUser()->can('Administrator')
        ],
        ['label' => Yii::t('app', 'Questions'), 'url' => ['/question']],
        ['label' => Yii::t('app', 'Answers'),   'url' => ['/answer']],
        ['label' => Yii::t('app', 'Users'),     'url' => ['/user']],
        ['label' => Yii::t('app', 'Frontend'),  'url' => Yii::$app->urlManagerFrontend->createUrl(['questions'])],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

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
        <p class="pull-left">&copy; ЗАО "МегаЛабс" 2016, version 1.10.2, <?= date('Y') ?></p>
        <!--p class="pull-left">&copy; mishaikon <?= date('Y') ?></p-->
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
