<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .question-search {
        width: 800px;
        background-color: #c7ddef;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #000;
    }
    #searchtab td {
        padding: 10px;
    }
</style>


<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="searchtab">
        <tr>
            <td width="50%" valign="top">
                <?= $form->field($model, 'title') ?>

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


            </td>
        </tr>

    </table>

    <div class="form-group" style="text-align: center; padding-top:5px;">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        &nbsp;&nbsp;&nbsp;
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />