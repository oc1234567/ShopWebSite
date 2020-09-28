<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\market\MarketProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="market-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'market_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
