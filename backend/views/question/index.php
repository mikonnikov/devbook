<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;

/**
 * Cut text
 * @param $str source string
 * @return string cutted text
 */
function shortTitle($str)
{
    if(strlen($str) > 30) {
        return htmlspecialchars(substr($str, 0, 20)." ...");
    }

    return htmlspecialchars($str);
}

?>

<style>
.dtcol {
    font-size: 11px;
    width: 30px;
    word-break: break-all;
    overflow: hidden;
    word-wrap: break-word;
}
.question-index {
    left: 0px;
    margin-left: 0px;
    padding-left: 0px;
}
</style>

<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Question'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'add_time',
                'contentOptions' => [
                    'class' => 'dtcol'
                ],
                'value' => function($model) {
                    return (isset($model->add_time) ? str_replace(" ", "<br />", $model->add_time) : '-');
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'edit_time',
                'contentOptions' => [
                    'class' => 'dtcol'
                ],
                'value' => function($model) {
                    return (isset($model->edit_time) ? str_replace(" ", "<br />", $model->edit_time) : '-');
                },
                'format' => 'raw',
            ],
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
                    return Html::a(count($model->getAnswers()), ['/answer', 'AnswerSearch[question_id]' => $model->id ]).'&nbsp;&nbsp;&nbsp;'.
                           Html::a("<span class='glyphicon glyphicon-plus'></span>", ['/answer/create', 'question_id' => $model->id, 'title' => 'Re: '.$model->title ]);
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
                'label'     => 'Private question',
                'attribute' => 'private',
                'value' => function($model) {
                    return ($model->private ? 'Yes' : 'No');
                },
                'format' => 'raw',
            ],
            [
                'label'     => 'Private question',
                'attribute' => 'private',
                'value' => function($model) {
                    return ($model->private ? 'Yes' : 'No');
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
            [
                'label' => 'Ticket',
                'value' => function($model) {
                    $is_url = filter_var($model->ticket, FILTER_VALIDATE_URL);
                    if($is_url) {
                        return ($model->ticket ? "<span style='text-align:center; width:100%;' title='".$model->ticket."'><a href='".$model->ticket."' target='_blank'><span class='glyphicon glyphicon-link'></span></a></span>" : '-');
                    } else {
                        return ($model->ticket ? "<span style='text-align:center; width:100%;' title='".$model->ticket."'>".shortTitle($model->ticket)."</span>" : '-');
                    }
                },
                'format' => 'raw',
            ],
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
    <?php Pjax::end(); ?>

</div>
