<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\Agama;
use backend\master\models\AgamaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Json;

/**
 * AgamaController implements the CRUD actions for Agama model.
 */
class AgamaController extends Controller
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
       * Before Action Index
       * if not login then logout
         * @author wawan
         * @since 1.0
       */
    public function beforeAction(){
      
        if (Yii::$app->user->isGuest){
                 Yii::$app->user->logout();
              $this->redirect(array('/site/login'));  //
            }else{
                return true;
        }
    }
    

    /**
     * Lists all Agama models.
     * @return mixed
     */
    public function actionIndex()
    {
        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

     if($paramCari != ''){
        $cari=['id_agama'=>$paramCari];
      }else{
        $cari='';
      };

        $searchModel = new AgamaSearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->post('hasEditable'))
        {
            $ID = \Yii::$app->request->post('editableKey');
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = Agama::findOne($ID);
           
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Agama']);
            $post['Agama'] = $posted;


            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model


                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';
         
          
                if (isset($posted['nama_agama'])) {
                    $model->save();
                    $output = $model->nama_agama;                 
                }

                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the Book model
                // similarly you can check if the name attribute was posted as well

                $out = Json::encode(['output'=>$output, 'message'=>'']);


            // return ajax json encoded response and exit
            echo $out;

            return;
          }
        }

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
            ->delete(Agama::tableName(), ['id_agama'=>$id])
            ->execute();
             
         }
         
     return true;
   
       }

    /**
     * Displays a single Agama model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Agama model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Agama();

        if ($model->load(Yii::$app->request->post())) {

             $model->save();
            return $this->redirect(['index', 'id' => $model->id_agama]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Agama model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_agama]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Agama model.
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
     * Finds the Agama model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Agama the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agama::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
