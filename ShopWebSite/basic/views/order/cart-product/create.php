<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\order\CartProduct */

$this->title = 'Create Cart Product';
$this->params['breadcrumbs'][] = ['label' => 'Cart Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
