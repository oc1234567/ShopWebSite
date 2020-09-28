<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\market\MarketProduct */

$this->title = 'Update Market Product: ' . $model->market_id;
$this->params['breadcrumbs'][] = ['label' => 'Market Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->market_id, 'url' => ['view', 'market_id' => $model->market_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="market-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
