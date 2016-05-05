<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;

/**
 * Cut text
 * @param $str source string
 * @return string cutted text
 */
function shortTitle($str) {
    if(strlen($str) > 30) {
        return htmlspecialchars(substr($str, 0, 30)." ...");
    }
    return htmlspecialchars($str);
}
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
            'add_time',
            'edit_time',
            [
                'label'     => 'Title',
                'value' => function($model) {
                    return (isset($model->title) ? Html::a(shortTitle($model->title), ['/question/update', 'id' => $model->id ]) : '-');
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Answers',
                'value' => function($model) {
                    return Html::a(count($model->getAnswers()), ['/answer', 'AnswerSearch[question_id]' => $model->id ]);
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Problem solved',
                'attribute' => 'solved',
                'value' => function($model) {
                    return ($model->solved ? 'Yes' : 'No');
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Error text',
                'value' => function($model) {
                    return "<span title='".htmlspecialchars($model->error)."'>".Html::a(shortTitle($model->error), ['/question/update', 'id' => $model->id ]) ."</span>";
                },
                'format' => 'html',
            ],
            [
                'label' => 'Error URL',
                'value' => function($model) {
                    return ($model->error_url ? "<span style='text-align:center; width:100%;' title='".$model->error_url."'><a href='".$model->error_url."' target='_blank'><span class='glyphicon glyphicon-link'></span></a></span>" : '-');
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Problem description',
                'value' => function($model) {
                    return "<span title='".htmlspecialchars($model->descr)."'>".shortTitle($model->descr)."</span>";
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Authors solution',
                'value' => function($model) {
                    return "<span title='".htmlspecialchars($model->answer)."'>".shortTitle($model->answer)."</span>";
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Solution URL',
                'value' => function($model) {
                    return ($model->answer_url ? "<span style='text-align:center; width:100%;' title='".$model->answer_url."'><a href='".$model->answer_url."' target='_blank'><span class='glyphicon glyphicon-link'></span></a></span>" : '-');
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Project',
                'value' => function($model) {
                    return (isset($model->project) ? Html::a($model->project->name, ['/project/view', 'id' => $model->project_id ]) : '-');
                },
                'format' => 'raw',
            ],
            'ticket:url',
            [
                'label'     => 'Category',
                'value' => function($model) {
                    return (isset($model->category) ? Html::a($model->category->name, ['/category/view', 'id' => $model->category_id ]) : '-');
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Language',
                'value' => function($model) {
                    return (isset($model->language) ? Html::a($model->language->name, ['/language/view', 'id' => $model->language_id ]) : '-');
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
