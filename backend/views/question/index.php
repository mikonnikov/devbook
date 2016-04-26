<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Question'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'error',
            'descr:ntext',
            'answer:ntext',
            [
                'label'     => 'Project',
                'value' => function($model) {
                    return Html::a($model->project->name, ['/project/view', 'id' => $model->project_id ]);
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Category',
                'value' => function($model) {
                    return Html::a($model->category->name, ['/category/view', 'id' => $model->category_id ]);
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Language',
                'value' => function($model) {
                    return Html::a($model->language->name, ['/language/view', 'id' => $model->language_id ]);
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Author',
                'value' => function($model) {
                    return Html::a($model->user->username, ['/user/view', 'id' => $model->user_id ]);
                },
                'format' => 'raw',
            ],
            'add_time',
            'edit_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
