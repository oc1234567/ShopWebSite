<?php

namespace app\controllers\api;

use yii\rest\ActiveController;

class ProductsController extends ActiveController
{
    public $modelClass = 'app\models\product\Product';


}