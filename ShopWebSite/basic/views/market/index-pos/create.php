<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\market\IndexPos */

$this->title = 'Create Index Pos';
$this->params['breadcrumbs'][] = ['label' => 'Index Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-pos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
