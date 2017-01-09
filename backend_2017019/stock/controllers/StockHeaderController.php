<?php

namespace backend\stock\controllers;

use Yii;
use backend\stock\models\StockObatheader;
use backend\stock\models\StockObatheaderSearch;
use backend\stock\models\StockObatDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Json;

/**
 * StockHeaderController implements the CRUD actions for StockObatheader model.
 */
class StockHeaderController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all StockObatheader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockObatheaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * delete using ajax.
     * @author wawan
     * @since 1.1.0
     * @return mixed
     */
   public function actionPilihDelete(){

            if (Yii::$app->request->isAjax) {

                Yii::$app->response->format = Response::FORMAT_JSON;
                $request= Yii::$app->request;
                $dataKeySelect=$request->post('keysSelect');
                foreach ($dataKeySelect as $key => $value) {
              
                   $id[] = $value; 
             }

            Yii::$app->db->createCommand()
            ->delete(StockObatheader::tableName(), ['kd_stock_header'=>$id])
            ->execute();
             
         }
         
     return true;
   
       }

    /**
     * Displays a single StockObatheader model.
     * @param string $id
     * @return mixed
     */
    public function actionReviewStock($id)
    {
        if($id){
            $kd_stock_header =['kd_stock_header'=>$id];
        }else{
            $kd_stock_header =  "";   
        }
        $searchModel = new StockObatdetailSearch($kd_stock_header);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('detail_stock', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }



    /**
     * Displays a single StockObatheader model.
     * @param string $id
     * @return mixed
     */
    public function actionReview($id)
    {
        return $this->render('review', [
            'model' => $this->findModel($id),
        ]);
    }
    

    /**
     * Creates a new StockObatheader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StockObatheader();

        if ($model->load(Yii::$app->request->post())) {
            $model->kd_stock_header = Yii::$app->ambilkonci->getKey_stock();
            $model->user_create = Yii::$app->user->identity ->id;
            $model->date_create = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StockObatheader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->kd_stock_header]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StockObatheader model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StockObatheader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return StockObatheader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockObatheader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
