<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$ans = $model->getAnswers();
?>
<div class="question-view">

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
            'title',
            'error',
            'error_url:url',
            'descr:ntext',
            'answer:ntext',
            [
                'label'     => 'Project',
                'value'     => (isset($model->project) ? Html::a($model->project->name, ['/project/view', 'id' => $model->project_id ]) : '-'),
                'format'    => 'raw',
            ],
            'ticket:url',
            [
                'label'     => 'Category',
                'value'     => (isset($model->category) ? Html::a($model->category->name, ['/category/view', 'id' => $model->category_id ]) : '-'),
                'format'    => 'raw',
            ],
            [
                'label'     => 'Language',
                'value'     => (isset($model->language) ? Html::a($model->language->name, ['/language/view', 'id' => $model->language_id ]) : '-'),
                'format'    => 'raw',
            ],
            [
                'label'     => 'Author',
                'value'     => (isset($model->user) ? Html::a($model->user->username, ['/user/view', 'id' => $model->user_id ]) : '-'),
                'format'    => 'raw',
            ],
            'add_time',
            'edit_time',
            'solved:boolean',
            [
                'label'     => 'Answers',
                'value'     => (count($ans) ? Html::a('('.count($ans).'): '.implode(', ', $ans), ['/answer', 'AnswerSearch[question_id]' => $model->id ]) : '-'),
                'format'    => 'raw',
            ],
        ],
    ]) ?>

</div>
