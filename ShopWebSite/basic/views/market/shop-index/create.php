<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\market\ShopIndex */

$this->title = 'Create Shop Index';
$this->params['breadcrumbs'][] = ['label' => 'Shop Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
