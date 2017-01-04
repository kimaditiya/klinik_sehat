<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\Obat;
use backend\master\models\ObatSearch;
use backend\master\models\TypeObat;
use backend\master\models\JenisObat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * ObatController implements the CRUD actions for Obat model.
 */
class ObatController extends Controller
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
     * Lists all Obat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

     if($paramCari != ''){
        $cari=['kd_obat'=>$paramCari];

         $url = Url::toRoute(['/master/obat/view','id'=>$paramCari]);
             $js='$("#modal-view-obats").modal("show")
              .find("#modalContentviewobats").html("<i class=\"fa fa-2x fa-spinner fa-spin\"></i>")
              .load("'.$url.'")';
              
           $this->getView()->registerJs($js);

      }else{
        $cari='';
      };

        $searchModel = new ObatSearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         if(Yii::$app->request->post('hasEditable'))
        {
            $ID = \Yii::$app->request->post('editableKey');
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = Obat::findOne($ID);
           
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Obat']);
            $post['Obat'] = $posted;


            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model


                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';
         
          
                if (isset($posted['nama_obat'])) {
                    $model->save();
                    $output = $model->nama_obat;                 
                }
                if (isset($posted['nametype'])) {
                    $model->id_type_obat = $posted['nametype'];
                    $model->save();
                    $output = $model->id_type_obat;                  
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
            'data_type_obat'=>self::AryTypeObat(),
            // 'data_jenis_obat'=>self::AryJenisObat()
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
            ->delete(Obat::tableName(), ['kd_obat'=>$id])
            ->execute();
             
         }
         
     return true;
   
       }


    #list array status
    public function aryStatus(){
        $aryStt= [
          ['STATUS' => 1, 'STT_NM' => 'InActive'],
          ['STATUS' => 0, 'STT_NM' => 'Active'],
        ];

        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    #list array type obat
    public function AryTypeObat(){
        return ArrayHelper::map(TypeObat::find()->all(),'id_type','type_obat');
    }

     #list array jenis obat
    public function AryJenisObat(){
        return ArrayHelper::map(JenisObat::find()->all(),'id_jenis_obat','jenis_obat');
    }

    /**
     * Displays a single Obat model.
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
            return $this->redirect(['index','id'=>$model->kd_obat]);
        } else {
            return $this->renderAjax('view', [
                'model' =>$model,
                'data_type_obat'=>self::AryTypeObat(),
                'data_jenis_obat'=>self::AryJenisObat()
            ]);
        }
    }


    /**
     * Displays a single Obat model.
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
           return $this->redirect(['index','id'=>$model->kd_obat]);
        } else {
            return $this->renderAjax('edit', [
                'model' => $model,
                'data_type_obat'=>self::AryTypeObat(),
                'data_jenis_obat'=>self::AryJenisObat()
            ]);
        }
    }




    /**
     * Creates a new Obat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Obat();

        if ($model->load(Yii::$app->request->post())) {
            $model->kd_obat = Yii::$app->ambilkonci->getKey_obat();
            $model->user_create = Yii::$app->user->identity ->id;
            $model->date_create = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$model->kd_obat]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'ary_type_obat'=>self::AryTypeObat(),
                'ary_jenis_obat'=>self::AryJenisObat(),
            ]);
        }
    }

    /**
     * Updates an existing Obat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->kd_obat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Obat model.
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
     * Finds the Obat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Obat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Obat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
