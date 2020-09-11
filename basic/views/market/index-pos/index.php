<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\market\IndexPosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Index Pos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-pos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Index Pos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'index_id',
            'column',
            'row',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
