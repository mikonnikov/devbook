<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use dosamigos\selectize\SelectizeTextInput;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
.answer-form, .answers-list {
    border: solid #CCC 1px;
    margin: 10px;
    padding: 10px;
}
</style>

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
            <dd><span><?php echo ($model->solved ? Yii::t('app', 'YES') : Yii::t('app', 'NO')); ?></span></dd>

            <dt><?=Yii::t('app', 'Creation time')?></dt>
            <dd><span><?php echo $model->add_time; ?></span></dd>

            <?php if(trim($model->error)!=''): ?>
                <dt><?=Yii::t('app', 'Error text')?></dt>
                <dd><span><pre><?php echo $model->error; ?></pre></span></dd>
            <?php endif; ?>

            <?php if(isset($model->error_url) && trim($model->error_url)!=''): ?>
                <dt><?=Yii::t('app', 'Error URL')?></dt>
                <dd><span><?php echo $model->error_url; ?></span></dd>
            <?php endif; ?>

            <?php if(isset($model->category->name) && trim($model->category->name)!=''): ?>
                <dt><?=Yii::t('app', 'Category')?></dt>
                <dd><span><?php echo $model->category->name; ?></span></dd>
            <?php endif; ?>

            <?php if(isset($model->language->name) && trim($model->language->name)!=''): ?>
                <dt><?=Yii::t('app', 'Language')?></dt>
                <dd><span><?php echo $model->language->name; ?></span></dd>
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
                </a>
            </span></dd>
            <?php endif; ?>

            <?php if(trim($model->answer)!=''): ?>
                <dt><?=Yii::t('app', 'Author\'s answer')?></dt>
                <dd><span><?php echo nl2br($model->answer); ?></span></dd>
            <?php endif; ?>

        </dl>
    </div>

    <div class="answers-list">
        <h3>Recent answers:</h3>
        <?= ListView::widget([
            'dataProvider'  => $dataProviderAnswers,
            'itemView'      => '@frontend/views/answer/_view_item',
        ]); ?>
    </div>

    <div class="answer-form">

        <h3>Write your answer:</h3>

        <?php if(isset(\Yii::$app->user) && isset(\Yii::$app->user->identity)): ?>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($modelAnswer, 'question_id')->hiddenInput(['value' => $model->id])->label(false); ?>

            <?= $form->field($modelAnswer, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelAnswer, 'descr')->textarea(['rows' => 6]) ?>

            <?= $form->field($modelAnswer, 'add_time')->hiddenInput(['value' => date("Y-m-d H:i:s")])->label(false);  ?>

            <?= $form->field($modelAnswer, 'user_id')->hiddenInput(['value' => \Yii::$app->user->identity->id])->label(false);  ?>

            <?= $form->field($modelAnswer, 'ref_url')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Post answer'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        <?php else: ?>

            <p><?=Yii::t('app', 'Only autorized users can post comments/answers. Please, login/register.')?></p>

        <?php endif; ?>

    </div>

</div>
