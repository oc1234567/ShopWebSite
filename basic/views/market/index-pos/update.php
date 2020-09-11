<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\market\IndexPos */

$this->title = 'Update Index Pos: ' . $model->index_id;
$this->params['breadcrumbs'][] = ['label' => 'Index Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->index_id, 'url' => ['view', 'id' => $model->index_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="index-pos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
