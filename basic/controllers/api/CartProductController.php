<?php

namespace app\controllers\api;

use yii\rest\ActiveController;

class CartProductController extends ActiveController
{
    public $modelClass = 'app\models\order\CartProduct';


}