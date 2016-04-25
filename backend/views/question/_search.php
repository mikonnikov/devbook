<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.question-search {
    width: 450px;
    background-color: #c7ddef;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #000;
}
</style>


<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'descr') ?>

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

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'edit_time') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <?php // echo $form->field($model, 'error') ?>

    <?php // echo $form->field($model, 'answer_url') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />