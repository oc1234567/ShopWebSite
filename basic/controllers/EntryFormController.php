<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;

class EntryFormController extends Controller
{
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // verify

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 初始化显示 or 数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }
}