<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index' ]];
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'name',
                'value' => function($model) {
                    return Html::a($model->name, ['/category', 'parent_id' => $model->id ]);
                },
                'format' => 'raw',
                'label'     => 'Parent category',
            ],
            [
                'attribute' => 'parent.name',
                'label'     => 'Parent category',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
