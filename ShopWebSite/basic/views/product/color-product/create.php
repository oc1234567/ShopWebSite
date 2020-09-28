<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product\ColorProduct */

$this->title = 'Create Color Product';
$this->params['breadcrumbs'][] = ['label' => 'Color Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
