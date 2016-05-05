<?php

use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('app', 'Have a problem?')?></h1>
        <p class="lead">
            <?=Yii::t('app', 'Find solution quickly:')?>
            <input type="text" value="" />
            <a class="btn btn-success" href="/questions" style="height:38px; vertical-align: top; padding-top:3px;"><?=Yii::t('app', 'Find')?></a>
        </p>
    </div>

    <div class="body-content">
        <div class="row" style="margin-top:-80px;">
            <div class="col-lg-8">
                <h2>Latest questions</h2>

                <?php \yii\widgets\Pjax::begin(['id' => 'questions-grid']); ?>

                <?= ListView::widget([
                    'dataProvider'  => $dataProviderQuestions,
                    'itemView'      => 'questions/_view_item',
                ]); ?>

                <?php \yii\widgets\Pjax::end(); ?>

                <p><a class="btn btn-default" href="/questions"><?=Yii::t('app', 'All questions')?> &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Top experts</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><a class="btn btn-default" href="/users"><?=Yii::t('app', 'All experts')?> &raquo;</a></p>
            </div>
        </div>
    </div>

</div>
