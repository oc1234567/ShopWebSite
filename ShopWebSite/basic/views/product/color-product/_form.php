<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\product\ColorProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="color-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'color_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
