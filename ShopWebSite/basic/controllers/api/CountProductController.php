<?php

namespace app\controllers\api;

use yii\rest\ActiveController;
use app\models\product\CountProduct;

class CountProductController extends ActiveController
{
    public $modelClass = 'app\models\product\countProduct';

    public function actions() {
        return [];
    }

    /**
     * Displays a single CountProduct model.
     * @param integer $size_id
     * @param integer $color_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($size_id, $color_id, $product_id)
    {
        return $this->findModel($size_id, $color_id, $product_id);
    }

    /**
     * Finds the CountProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $size_id
     * @param integer $color_id
     * @param integer $product_id
     * @return CountProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($size_id, $color_id, $product_id)
    {
        if (($model = CountProduct::findOne(['size_id' => $size_id, 'color_id' => $color_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}