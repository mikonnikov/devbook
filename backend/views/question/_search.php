<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<script language="javascript" src="/js/common.js"></script>

<div class="question-search" id="extSearch" style="display:<?=($ext_search ? 'block' : 'none')?>">

    <p><a class="dotHref" id="myAnswer" onClick="toggleSearch(0);"><?=Yii::t('app', 'Quick search')?></a></p>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <input type="hidden" name="ext_search" value="1" />

    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="searchtab">
        <tr>
            <td width="50%" valign="top">
                <?= $form->field($model, 'title') ?>

                <?= $form->field($model, 'descr') ?>

                <?= $form->field($model, 'error') ?>

                <?= $form->field($model, 'answer') ?>

            </td>
            <td width="50%" valign="top">
                <?=
                $form->field($model, 'project_id')->widget(
                    \kartik\select2\Select2::className(),
                    [
                        'model'     => $model,
                        'attribute' => 'project_id',
                        'data'      => \common\models\Project::getProjectsList(),
                        'options'   => ['multiple' => false, 'placeholder' => 'Select project'],
                        'pluginOptions' => [ 'allowClear' => true ]
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
                        'options'   => ['multiple' => false, 'placeholder' => 'Select category'],
                        'pluginOptions' => [ 'allowClear' => true ]
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
                        'options'   => ['multiple' => false, 'placeholder' => 'Select language'],
                        'pluginOptions' => [ 'allowClear' => true ]
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
                        'options'   => ['multiple' => false, 'placeholder' => 'Select user'],
                        'pluginOptions' => [ 'allowClear' => true ]
                    ]
                )
                ?>

                <?php // echo $form->field($model, 'add_time') ?>

                <?php // echo $form->field($model, 'edit_time') ?>

                <?php // echo $form->field($model, 'answer_url') ?>

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
