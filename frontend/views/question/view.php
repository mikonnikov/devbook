<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$ans = $model->getAnswers();
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this question?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="" style="border: solid #CCC 1px; margin: 10px; padding: 10px;">
        <dl class="dl-horizontal">

            <dt><?=Yii::t('app', 'Problem solved?')?></dt>
            <dd><span><?php ($model->solved==1 ? Yii::t('app', 'YES') : Yii::t('app', 'NO')); ?></span></dd>

            <dt><?=Yii::t('app', 'Creation time')?></dt>
            <dd><span><?php echo $model->add_time; ?></span></dd>

            <?php if(trim($model->error)!=''): ?>
                <dt><?=Yii::t('app', 'Error text')?></dt>
                <dd><span><?php echo $model->error; ?></span></dd>
            <?php endif; ?>

            <?php if(trim($model->error_url)!=''): ?>
                <dt><?=Yii::t('app', 'Error URL')?></dt>
                <dd><span><?php echo $model->error_url; ?></span></dd>
            <?php endif; ?>

            <?php if(trim($model->category)!=''): ?>
                <dt><?=Yii::t('app', 'Category')?></dt>
                <dd><span><?php echo $model->category; ?></span></dd>
            <?php endif; ?>

            <?php if(trim($model->language)!=''): ?>
                <dt><?=Yii::t('app', 'Language')?></dt>
                <dd><span><?php echo $model->language; ?></span></dd>
            <?php endif; ?>

            <?php if(trim($model->descr)!=''): ?>
                <dt><?=Yii::t('app', 'Description')?></dt>
                <dd><span><?php echo $model->descr; ?></span></dd>
            <?php endif; ?>

            <?php if($model->user && trim($model->user->username)!=''): ?>
                <dt><?=Yii::t('app', 'Author')?></dt>
                <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/users/view', 'id' => $model->user->id]);?>">
                    <?php echo "&nbsp;" . $model->user->username; ?>
            </span></dd>
            <?php endif; ?>

            <?php if(trim($model->answer)!=''): ?>
                <dt><?=Yii::t('app', 'Author\'s answer (own solution)')?></dt>
                <dd><span><?php echo $model->answer; ?></span></dd>
            <?php endif; ?>

        </dl>
    </div>

    <div>
        <!-- comments/answer block -->
    </div>

</div>
