<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Answers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Answer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label'     => 'Question title',
                'value'     => function($model) {
                                    return (isset($model->question->title) ? "<span title='".htmlspecialchars($model->question->title)."'>".Html::a($model->question->title, ['/question/view', 'id' => $model->question_id ])."</span>" : '-');
                               },
                'format'    => 'raw',
            ],
            [
                'label'     => 'Answer title',
                'value' => function($model) {
                    return (isset($model->title) ? "<span title='".htmlspecialchars($model->title)."'>".Html::a(htmlspecialchars(substr($model->title, 0, 30)), ['/question/update', 'id' => $model->id ])."</span>" : '-');
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Answer text',
                'value' => function($model) {
                    return "<span title='".htmlspecialchars($model->descr)."'>".htmlspecialchars(substr($model->descr, 0, 30))."</span>";
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Author',
                'value' => function($model) {
                    return (isset($model->user) ? Html::a($model->user->username, ['/user/view', 'id' => $model->user_id ]) : '-');
                },
                'format' => 'raw',
            ],
            'add_time',
            'ref_url:url',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
