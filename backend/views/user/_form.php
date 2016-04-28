<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['value' => $model->email]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'status')->checkbox(['label' => 'Active', 'value' => '10', 'unchecked' => '0']) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value' => ($model->isNewRecord ? time() : $model->created_at)])->label(false);  ?>

    <?= $form->field($model, 'updated_at')->hiddenInput(['value' => time()])->label(false);  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
