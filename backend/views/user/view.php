<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?=Yii::t('app', 'User');?> <?= Html::encode($this->title) ?></h1>

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
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status:boolean',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'label'     => Yii::t('app', 'Questions'),
                'value'     => Html::a(count($model->questionsList()), ['/question/index', 'QuestionSearch[user_id]' => $model->id, 'ext_search' => 1]),
                'format'    => 'raw',
            ],
            [
                'label'     => Yii::t('app', 'Answers'),
                'value'     => Html::a(count($model->answersList()), ['/answer/index', 'AnswerSearch[user_id]' => $model->id]),
                'format'    => 'raw',
            ],
        ],
    ]) ?>

</div>
