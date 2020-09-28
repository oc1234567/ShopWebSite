<?php

namespace app\controllers\market;

use Yii;
use app\models\market\MarketProduct;
use app\models\market\MarketProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarketProductController implements the CRUD actions for MarketProduct model.
 */
class MarketProductController extends Controller
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
     * Lists all MarketProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MarketProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MarketProduct model.
     * @param integer $market_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($market_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($market_id, $product_id),
        ]);
    }

    /**
     * Creates a new MarketProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MarketProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'market_id' => $model->market_id, 'product_id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MarketProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $market_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($market_id, $product_id)
    {
        $model = $this->findModel($market_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'market_id' => $model->market_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MarketProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $market_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($market_id, $product_id)
    {
        $this->findModel($market_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MarketProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $market_id
     * @param integer $product_id
     * @return MarketProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($market_id, $product_id)
    {
        if (($model = MarketProduct::findOne(['market_id' => $market_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
