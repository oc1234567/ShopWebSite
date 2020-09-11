<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductionPic */

$this->title = 'Create Production Pic';
$this->params['breadcrumbs'][] = ['label' => 'Production Pics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-pic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
