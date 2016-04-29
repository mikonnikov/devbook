<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AnswerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.answer-search {
    width: 450px;
    background-color: #c7ddef;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #000;
}
</style>

<div class="answer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?=
    $form->field($model, 'question_id')->widget(
        \kartik\select2\Select2::className(),
        [
            'model'     => $model,
            'attribute' => 'question_id',
            'data'      => \common\models\Question::getQuestionsList(),
            'options'   => ['multiple' => false, 'placeholder' => 'Question']
        ]
    )
    ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'descr') ?>

    <?=
    $form->field($model, 'user_id')->widget(
        \kartik\select2\Select2::className(),
        [
            'model'     => $model,
            'attribute' => 'user_id',
            'data'      => \common\models\User::getUsersList(),
            'options'   => ['multiple' => false, 'placeholder' => 'Select user']
        ]
    )
    ?>

    <?php // $form->field($model, 'add_time') ?>

    <?php echo $form->field($model, 'ref_url') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />