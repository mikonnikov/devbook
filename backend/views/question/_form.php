<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'answer_url')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'project_id')->widget(
        \kartik\select2\Select2::className(),
        [
            'model'     => $model,
            'attribute' => 'project_id',
            'data'      => \common\models\Project::getProjectsList(),
            'options'   => ['multiple' => false, 'placeholder' => 'Select project']
        ]
    )
    ?>

    <?=
    $form->field($model, 'category_id')->widget(
        \kartik\select2\Select2::className(),
        [
            'model'     => $model,
            'attribute' => 'category_id',
            'data'      => \common\models\Category::getCategoriesList(),
            'options'   => ['multiple' => false, 'placeholder' => 'Select category']
        ]
    )
    ?>

    <?=
    $form->field($model, 'language_id')->widget(
        \kartik\select2\Select2::className(),
        [
            'model'     => $model,
            'attribute' => 'language_id',
            'data'      => \common\models\Language::getLanguagesList(),
            'options'   => ['multiple' => false, 'placeholder' => 'Select language']
        ]
    )
    ?>

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

    <?= $form->field($model, 'add_time')->hiddenInput(['value' => ($model->add_time ? $model->add_time : date("Y-m-d H:i:s"))])->label(false);  ?>
    <?php /*print $form->field($model, 'add_time')->widget(
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
    ) */
    ?>

    <?= $form->field($model, 'edit_time')->hiddenInput(['value' => date("Y-m-d H:i:s")])->label(false);  ?>
    <?php /*print $form->field($model, 'edit_time')->widget(
        \kartik\datetime\DateTimePicker::className(),
        [
            'name'          => 'edit_time',
            'options'       => ['placeholder' => Yii::t('app', 'Select date')],
            'convertFormat' => true,
            'pluginOptions' => [
                'format'    => 'yyyy-MM-dd HH:i:ss',
                'autoclose' => true,
                'todayHighlight' => true
            ]
        ]
    )*/
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
