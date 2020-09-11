<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WarehouseProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Warehouse Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'current_cnt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
