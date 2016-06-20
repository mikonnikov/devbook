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

<script language="javascript" src="/js/common.js"></script>

<div class="question-search" id="quickSearch" style="display:<?=($ext_search ? 'none' : 'block')?>">

    <p><a class="dotHref" id="myAnswer" onClick="toggleSearch(1);"><?=Yii::t('app', 'Extended search')?></a></p>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <input type="hidden" name="ext_search" value="0" />

    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="searchtab" style="width:100%;">
        <tr>
            <td valign="top" style="width:300px;">
                <?= $form->field($model, 'title')->label(false) ?>
            </td>
            <td valign="top">
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
            <td valign="top">
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
            <td valign="top" nowrap="nowrap">
                <div style="width:200px;">
                    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary', 'style' => 'margin-right:10px;']) ?>
                </div>
            </td>
        </tr>
    </table>

    <?php ActiveForm::end(); ?>

</div>
