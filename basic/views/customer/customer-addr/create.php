<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\customer\CustomerAddr */

$this->title = 'Create Customer Addr';
$this->params['breadcrumbs'][] = ['label' => 'Customer Addrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-addr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
