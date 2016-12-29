<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\TypeObat;
use backend\master\models\TypeObatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\helpers\Json;

/**
 * TypeObatController implements the CRUD actions for TypeObat model.
 */
class TypeObatController extends Controller
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
          ['STATUS' => 1, 'STT_NM' => 'Inactve'],
          ['STATUS' => 0, 'STT_NM' => 'Active'],
        ];

        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    /**
     * Lists all TypeObat models.
     * @return mixed
     */
    public function actionIndex()
    {

        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

     if($paramCari != ''){
        $cari=['id_type'=>$paramCari];
      }else{
        $cari='';
      };

        $searchModel = new TypeObatSearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         if(Yii::$app->request->post('hasEditable'))
        {
            $ID = \Yii::$app->request->post('editableKey');
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = TypeObat::findOne($ID);
           
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['TypeObat']);
            $post['TypeObat'] = $posted;


            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model


                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';
         
          
                if (isset($posted['type_obat'])) {
                    $model->save();
                    $output = $model->type_obat;                 
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
            'valStt'=>self::aryStatus()
        ]);
    }

    /**
     * Displays a single TypeObat model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TypeObat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeObat();

        if ($model->load(Yii::$app->request->post())){
            $model->user_create = Yii::$app->user->identity ->id;
            $model->date_create = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$model->id_type]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
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
            ->delete(TypeObat::tableName(), ['id_type'=>$id])
            ->execute();
             
         }
         
     return true;
   
       }

    /**
     * Updates an existing TypeObat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->user_update = Yii::$app->user->identiy->id;
            $model->date_update = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$model->id_type]);
        } else {
            return $this->renderAjax('edit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TypeObat model.
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
     * Finds the TypeObat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TypeObat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TypeObat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
