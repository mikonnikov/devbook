<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Answer */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-view">

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
            [
                'label'     => 'Question',
                'value'     => (isset($model->question->title) ? Html::a(htmlspecialchars(substr($model->question->title, 0, 30)), ['/question/view', 'id' => $model->question_id ]) : '-'),
                'format'    => 'raw',
            ],
            'title',
            'descr:ntext',
            [
                'label'     => 'Author',
                'value'     => (isset($model->user) ? Html::a($model->user->username, ['/user/view', 'id' => $model->user_id ]) : '-'),
                'format'    => 'raw',
            ],
            'add_time:datetime',
            'ref_url:url',
        ],
    ]) ?>

</div>
