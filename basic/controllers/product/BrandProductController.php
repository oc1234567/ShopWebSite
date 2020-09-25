<?php

namespace app\controllers\product;

use Yii;
use app\models\product\BrandProduct;
use app\models\product\BrandProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BrandProductController implements the CRUD actions for BrandProduct model.
 */
class BrandProductController extends Controller
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
     * Lists all BrandProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrandProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BrandProduct model.
     * @param integer $brand_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($brand_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($brand_id, $product_id),
        ]);
    }

    /**
     * Creates a new BrandProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BrandProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'brand_id' => $model->brand_id, 'product_id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BrandProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $brand_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($brand_id, $product_id)
    {
        $model = $this->findModel($brand_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'brand_id' => $model->brand_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BrandProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $brand_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($brand_id, $product_id)
    {
        $this->findModel($brand_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BrandProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $brand_id
     * @param integer $product_id
     * @return BrandProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($brand_id, $product_id)
    {
        if (($model = BrandProduct::findOne(['brand_id' => $brand_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
