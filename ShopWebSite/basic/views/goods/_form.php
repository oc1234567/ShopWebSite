<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'gname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gdescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpast_due')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
