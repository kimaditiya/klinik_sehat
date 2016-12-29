<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\JenisObat;
use backend\master\models\JenisObatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\BaseActiveRecord;
use yii\db\ActiveRecord;
use yii\web\Response;
use yii\helpers\Json;

/**
 * JenisObatController implements the CRUD actions for JenisObat model.
 */
class JenisObatController extends Controller
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
    

    #list array status
    public function aryStatus(){
         $aryStt= [
          ['STATUS' => 1, 'STT_NM' => 'InActive'],
          ['STATUS' => 0, 'STT_NM' => 'Active'],
        ];

        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
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
            ->delete(JenisObat::tableName(), ['id_jenis_obat'=>$id])
            ->execute();
             
         }
         
     return true;
   
       }

    /**
     * Lists all JenisObat models.
     * @return mixed
     */
    public function actionIndex()
    {

        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

     if($paramCari != ''){
        $cari=['id_jenis_obat'=>$paramCari];
      }else{
        $cari='';
      };
        $searchModel = new JenisObatSearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->post('hasEditable'))
        {
            $ID = \Yii::$app->request->post('editableKey');
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = JenisObat::findOne($ID);
           
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['JenisObat']);
            $post['JenisObat'] = $posted;


            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model


                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';
         
          
                if (isset($posted['jenis_obat'])) {
                    $model->save();
                    $output = $model->jenis_obat;                 
                }
                if (isset($posted['description'])) {
                    $model->save();
                    $output = $model->description;                  
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
            'valStt'=>self::aryStatus(),
        ]);
    }



    /**
     * Displays a single JenisObat model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->user_update = Yii::$app->user->identity ->id;
            $model->date_update = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$model->id_jenis_obat]);
        } else {
            return $this->renderAjax('view', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Displays a single JenisObat model.
     * @param string $id
     * @return mixed
     */
    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->user_update = Yii::$app->user->identity ->id;
            $model->date_update = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$model->id_jenis_obat]);
        } else {
            return $this->renderAjax('edit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new JenisObat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JenisObat();

        if ($model->load(Yii::$app->request->post())) {

            // $model->on(ActiveRecord::EVENT_AFTER_INSERT,function($event){
            // });  event after save
            $model->user_create = Yii::$app->user->identity ->id;
            $model->date_create = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$model->id_jenis_obat]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JenisObat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jenis_obat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JenisObat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

     public function actionDelete() {
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && isset($post['custom_param'])) {
            $id = $post['id'];
            if ($this->findModel($id)->delete()) {
                return $this->redirect(['index']);
            } else {
                echo Json::encode([
                    'success' => false,
                    'messages' => [
                        'kv-detail-error' => 'Cannot delete the book # ' . $id . '.'
                    ]
                ]);
            }
            return;
        }

        // throw new NotFoundHttpException("You are not allowed to do this operation. Contact the administrator.");
    }


    /**
     * Finds the JenisObat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return JenisObat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisObat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
