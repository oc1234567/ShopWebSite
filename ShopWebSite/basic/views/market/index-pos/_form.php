<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\market\IndexPos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-pos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'index_id')->textInput() ?>

    <?= $form->field($model, 'column')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'row')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
