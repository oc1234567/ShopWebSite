<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\CountProduct */

$this->title = 'Update Count Product: ' . $model->size_id;
$this->params['breadcrumbs'][] = ['label' => 'Count Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->size_id, 'url' => ['view', 'size_id' => $model->size_id, 'color_id' => $model->color_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="count-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
