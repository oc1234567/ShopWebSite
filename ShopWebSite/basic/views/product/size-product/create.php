<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\SizeProduct */

$this->title = 'Create Size Product';
$this->params['breadcrumbs'][] = ['label' => 'Size Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
