<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\market\Market */

$this->title = 'Create Market';
$this->params['breadcrumbs'][] = ['label' => 'Markets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
