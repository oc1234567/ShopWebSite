<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\SizeProduct */

$this->title = 'Update Size Product: ' . $model->size_id;
$this->params['breadcrumbs'][] = ['label' => 'Size Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->size_id, 'url' => ['view', 'size_id' => $model->size_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="size-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
