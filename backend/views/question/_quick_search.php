<?php

/**
 * @source /frontend/views/question/_search.php
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search" id="quickSearch" style="width:100%; display:none;">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="searchtab">
        <tr>
            <td width="50%" valign="top">
                <?= $form->field($model, 'title')->label(false) ?>
            </td>
            <td width="20%" valign="top">
                <?=
                $form->field($model, 'category_id')->widget(
                    \kartik\select2\Select2::className(),
                    [
                        'model'     => $model,
                        'attribute' => 'category_id',
                        'data'      => \common\models\Category::getCategoriesList(),
                        'options'   => ['multiple' => false, 'placeholder' => 'Select category']
                    ]
                )->label(false)
                ?>
            </td>
            <td width="20%" valign="top">
                <?=
                $form->field($model, 'language_id')->widget(
                    \kartik\select2\Select2::className(),
                    [
                        'model'     => $model,
                        'attribute' => 'language_id',
                        'data'      => \common\models\Language::getLanguagesList(),
                        'options'   => ['multiple' => false, 'placeholder' => 'Select language']
                    ]
                )->label(false)
                ?>
            </td>
            <td width="10%" valign="top" nowrap="nowrap">
                <div style="width:200px;">
                    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary', 'style' => 'margin-right:10px;']) ?>
                    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default', 'style' => 'margin-right:10px;']) ?>
                    <a class="btn btn-danger" href="<?=Yii::$app->urlManager->createUrl(['/questions/create']);?>"><?=Yii::t('app', 'Ask')?></a>
                </div>
            </td>
        </tr>
    </table>

    <p><a class="dotHref" id="myAnswer" onClick="$('#search').html($('#extSearch').html());"><?=Yii::t('app', 'Extended search')?></a></p>

    <?php ActiveForm::end(); ?>

</div>
