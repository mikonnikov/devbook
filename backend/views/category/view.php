<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label'     => Yii::t('app', 'Parent category'),
                'value'     => (isset($model->parent) ? Html::a($model->parent->name . ' ('.$model->parent->id.')', ['/category/view', 'id' => $model->parent_id ]) : '-'),
                'format'    => 'raw',
            ],
            [
                'label'     => Yii::t('app', 'Questions'),
                'value'     => Html::a(count($model->getQuestionsList()), ['/question/index', 'QuestionSearch[category_id]' => $model->id]),
                'format'    => 'raw',
            ],
        ],
    ]) ?>

</div>
