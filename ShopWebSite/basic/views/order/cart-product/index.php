<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\order\CartProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cart Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cart Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'product_id',
            'product_num',
            'size_id',
            'color_id',
            //'add_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
