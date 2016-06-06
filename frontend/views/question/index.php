<?php

use yii\widgets\ListView;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

<h1><?= Html::encode($this->title) ?></h1>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<?= ListView::widget([
    'dataProvider'  => $dataProvider,
    'itemView'      => '_view_item',
]); ?>

</div>