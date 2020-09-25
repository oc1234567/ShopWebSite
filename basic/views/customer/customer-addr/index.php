<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\customer\CustomerAddrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Addrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-addr-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Addr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'zip',
            'province',
            'city',
            'district',
            'address',
            'is_default',
            'telephone',
            'shipping_user_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
