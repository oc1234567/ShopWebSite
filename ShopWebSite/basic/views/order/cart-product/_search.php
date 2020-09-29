<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\order\CartProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'size_id') ?>

    <?= $form->field($model, 'color_id') ?>

    <?= $form->field($model, 'product_num') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
