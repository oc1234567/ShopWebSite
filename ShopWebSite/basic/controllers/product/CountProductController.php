<?php

namespace app\controllers\product;

use Yii;
use app\models\product\CountProduct;
use app\models\product\CountProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountProductController implements the CRUD actions for CountProduct model.
 */
class CountProductController extends Controller
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
     * Lists all CountProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CountProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
        return $this->render('view', [
            'model' => $this->findModel($size_id, $color_id, $product_id),
        ]);
    }

    /**
     * Creates a new CountProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'size_id' => $model->size_id, 'color_id' => $model->color_id, 'product_id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CountProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $size_id
     * @param integer $color_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($size_id, $color_id, $product_id)
    {
        $model = $this->findModel($size_id, $color_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'size_id' => $model->size_id, 'color_id' => $model->color_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CountProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $size_id
     * @param integer $color_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($size_id, $color_id, $product_id)
    {
        $this->findModel($size_id, $color_id, $product_id)->delete();

        return $this->redirect(['index']);
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
