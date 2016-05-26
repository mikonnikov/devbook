<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if($model->status==10): ?>
            <?= Html::a(Yii::t('user', 'Deactivate'), ['status', 'id' => $model->id, 'status' => 0], [
                'class' => 'btn btn-danger',
                'data' => [
                    'method' => 'post',
                ],
            ]) ?>
        <?php else: ?>
            <?= Html::a(Yii::t('user', 'Activate'), ['status', 'id' => $model->id, 'status' => 10], [
                'class' => 'btn btn-info',
                'data' => [
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'status:boolean',
            'created_at:datetime',
        ],
    ]) ?>

</div>
