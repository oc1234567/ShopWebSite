<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\BrandProduct */

$this->title = 'Create Brand Product';
$this->params['breadcrumbs'][] = ['label' => 'Brand Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
