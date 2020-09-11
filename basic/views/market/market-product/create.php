<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\market\MarketProduct */

$this->title = 'Create Market Product';
$this->params['breadcrumbs'][] = ['label' => 'Market Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
