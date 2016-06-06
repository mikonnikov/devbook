<?php

use yii\widgets\ListView;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Experts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

<h1><?= Html::encode($this->title) ?></h1>

<?= ListView::widget([
    'dataProvider'  => $dataProviderUsers,
    'itemView'      => '_view_item',
]); ?>

</div>