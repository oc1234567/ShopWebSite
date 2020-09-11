<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\CountProduct */

$this->title = 'Create Count Product';
$this->params['breadcrumbs'][] = ['label' => 'Count Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="count-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
