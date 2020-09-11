<?php

namespace app\controllers\product;

use Yii;
use app\models\product\SizeProduct;
use app\models\product\SizeProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SizeProductController implements the CRUD actions for SizeProduct model.
 */
class SizeProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SizeProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SizeProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SizeProduct model.
     * @param integer $size_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($size_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($size_id, $product_id),
        ]);
    }

    /**
     * Creates a new SizeProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SizeProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'size_id' => $model->size_id, 'product_id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SizeProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $size_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($size_id, $product_id)
    {
        $model = $this->findModel($size_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'size_id' => $model->size_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SizeProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $size_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($size_id, $product_id)
    {
        $this->findModel($size_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SizeProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $size_id
     * @param integer $product_id
     * @return SizeProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($size_id, $product_id)
    {
        if (($model = SizeProduct::findOne(['size_id' => $size_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
