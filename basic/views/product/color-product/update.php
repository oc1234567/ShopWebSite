<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\ColorProduct */

$this->title = 'Update Color Product: ' . $model->color_id;
$this->params['breadcrumbs'][] = ['label' => 'Color Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->color_id, 'url' => ['view', 'color_id' => $model->color_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="color-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
