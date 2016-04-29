<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'user_id' )->hiddenInput(['value' => Yii::$app->user->identity->getId()])->label(false); ?>
        <?= $form->field($model, 'add_time')->hiddenInput(['value' => date("Y-m-d H:i:s")])->label(false);  ?>
    <?php else: ?>
        <?= $form->field($model, 'user_id')->widget(
            \kartik\select2\Select2::className(),
            [
                'model'     => $model,
                'attribute' => 'user_id',
                'data'      => \common\models\User::getUsersList(),
                'options'   => ['multiple' => false, 'placeholder' => 'Select user'],
            ]
        )
        ?>

        <?php print $form->field($model, 'add_time')->widget(
            \kartik\datetime\DateTimePicker::className(),
            [
                'name'          => 'add_time',
                'options'       => ['placeholder' => Yii::t('app', 'Select date')],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format'    => 'yyyy-MM-dd HH:i:ss',
                    'autoclose' => true,
                    'todayHighlight' => true
                ]
            ]
        )
        ?>
    <?php endif; ?>

    <?= $form->field($model, 'ref_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
