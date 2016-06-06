<?php

use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'DevBook';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('app', 'Have a problem?')?></h1>
        <p class="lead">
            <?=Yii::t('app', 'Find solution quickly:')?>
            <?php $form = ActiveForm::begin([
                'action' => ['/questions'],
                'method' => 'get',
            ]); ?>
                <input type="text" name="QuestionSearch[title]" value="" class="mainSearch"/>
                <a class="btn btn-success" href="<?=Yii::$app->urlManager->createUrl(['/questions/index']);?>" style="height:38px; vertical-align: top; padding-top:3px;"><?=Yii::t('app', 'Find')?></a>
                &nbsp;&nbsp;<?=Yii::t('app', 'OR')?>&nbsp;&nbsp;
                <a class="btn btn-danger" href="<?=Yii::$app->urlManager->createUrl(['/questions/create']);?>" style="height:38px; vertical-align: top; padding-top:3px;"><?=Yii::t('app', 'Ask question')?></a>
            <?php ActiveForm::end(); ?>
        </p>
    </div>

    <div class="body-content">
        <div class="row" style="margin-top:-80px;">
            <div class="col-lg-8">
                <h2>Latest questions</h2>

                <?php \yii\widgets\Pjax::begin(['id' => 'questions-grid']); ?>

                <?= ListView::widget([
                    'dataProvider'  => $dataProviderQuestions,
                    'itemView'      => '@frontend/views/question/_view_item',
                ]); ?>

                <?php \yii\widgets\Pjax::end(); ?>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['/questions/index']);?>"><?=Yii::t('app', 'All questions')?> &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Top experts</h2>
                <?= ListView::widget([
                    'dataProvider'  => $dataProviderUsers,
                    'itemView'      => '@frontend/views/user/_view_item',
                ]); ?>
                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['/users/index']);?>"><?=Yii::t('app', 'All experts')?> &raquo;</a></p>
            </div>
        </div>
    </div>

</div>
