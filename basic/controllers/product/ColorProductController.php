<?php

namespace app\controllers\product;

use Yii;
use app\models\product\ColorProduct;
use app\models\product\ColorProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColorProductController implements the CRUD actions for ColorProduct model.
 */
class ColorProductController extends Controller
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
     * Lists all ColorProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColorProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ColorProduct model.
     * @param integer $color_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($color_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($color_id, $product_id),
        ]);
    }

    /**
     * Creates a new ColorProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ColorProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'color_id' => $model->color_id, 'product_id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ColorProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $color_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($color_id, $product_id)
    {
        $model = $this->findModel($color_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'color_id' => $model->color_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ColorProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $color_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($color_id, $product_id)
    {
        $this->findModel($color_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ColorProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $color_id
     * @param integer $product_id
     * @return ColorProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($color_id, $product_id)
    {
        if (($model = ColorProduct::findOne(['color_id' => $color_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
