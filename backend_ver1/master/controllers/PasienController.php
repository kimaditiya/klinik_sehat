<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\Pasien;
use backend\master\models\PasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\master\models\Agama;
use backend\master\models\RekamHeader;
use backend\master\models\DetailRekamMedisSearch;
use backend\master\models\DetailRekamMedis;
use backend\master\models\Obat;
use backend\master\models\PostRekamMedis;
use yii\web\Response;
use yii\helpers\Json;
use ptrnov\postman4excel\Postman4ExcelBehavior;

/**
 * PasienController implements the CRUD actions for Pasien model.
 */
class PasienController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        'export4excel' => [
            'class' => Postman4ExcelBehavior::className(),
            'widgetType'=>'download'
      ], 

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
     * Lists all Pasien models.
     * @return mixed
     */
    public function actionIndex()
    {

         $paramCari=Yii::$app->getRequest()->getQueryParam('id');

         if($paramCari != ''){
            $cari=['id'=>$paramCari];
          }else{
            $cari='';
          };

        $searchModel = new PasienSearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         if(Yii::$app->request->post('hasEditable'))
        {
            $ID = \Yii::$app->request->post('editableKey');
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = Pasien::findOne($ID);
           
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Pasien']);
            $post['Pasien'] = $posted;


            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model


                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';

                $msg = '';
         
          
                if (isset($posted['nama_pasien'])) {
                    $model->save();
                    $output = $model->nama_pasien;                 
                }

                if (isset($posted['pekerjaan'])) {
                    $model->save();
                    $output = $model->nama_pasien;                 
                }
                if (isset($posted['telp'])) {
                    $model->save();
                    $output = $model->telp;                 
                }
                if (isset($posted['nomer_alias_pasien'])) {

                    $cek_nomer_pasien = Pasien::find()->where(['nomer_alias_pasien'=>$posted['nomer_alias_pasien']])
                                        ->one();

                    if(!$cek_nomer_pasien){
                        $model->save();
                        $output = $model->nomer_alias_pasien;
                    }else{
                        $output = 'sorry duplicate nomer';
                        $msg =  'sorry duplicate nomer';
                    }
                                    
                }
                if (isset($posted['agamaNama'])) {
                    $model->id_agama = $posted['agamaNama'];
                    $model->save();
                    $output = $model->agamaNama;                  
                }

                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the Book model
                // similarly you can check if the name attribute was posted as well

                $out = Json::encode(['output'=>$output, 'message'=>$msg]);


            // return ajax json encoded response and exit
            echo $out;

            return;
          }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_agama'=>self::ary_agama(),
            'valStt'=>self::aryStatus()
        ]);
    }


    public function actionPilihExport($idx){

      $tes = explode(',',$idx);

       foreach ($tes as  $value) {
              
              $id[] = $value; 
          }
  
        $data_pasien = Pasien::find()->where(['id'=>$id])->all();
        $data_export = ArrayHelper::toArray($data_pasien, [
            'backend\master\models\Pasien' => [
                'kd_pasien',
                'nama_pasien',
                'pekerjaan',
                'telp',
                'agamaNama',
                'Jeniskelaminx',
                'umur',
                'riwayatx',
                'nomerLama',
            ],
        ]);

       $excel_data = Postman4ExcelBehavior::excelDataFormat($data_export);
        $excel_title = $excel_data['excel_title'];
        $excel_ceils = $excel_data['excel_ceils'];

    $excel_content = [
       [
        'sheet_name' => 'Data Pasien',
                'sheet_title' =>  ['Kode Pasien','nama pasien','pekerjaan','telp','Nama Agama','Jenis Kelamin','Umur Pasien','Riwaya Alergi','Nomer Pasien Lama'],
        'ceils' => $excel_ceils,
                'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[            
          [
            'kd_pasien' =>['align'=>'center'],
            'nama_pasien' =>['align'=>'center'],
            'pekerjaan' => ['align'=>'center'],
            'agamaNama' => ['align'=>'center'],
            'telp' => ['align'=>'center'],
            'nomer_alias_pasien' =>['align'=>'center'],
          ]           
        ],
        'contentStyle'=>[
          [
            'kd_pasien' =>['align'=>'center'],
            'nama_pasien' =>['align'=>'center'],
            'pekerjaan' => ['align'=>'center'],
            'agamaNama' => ['align'=>'center'],
            'telp' => ['align'=>'center'],
            'nomer_alias_pasien' =>['align'=>'center'],
          ]           
        ],
               'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
      ]
    ];


    $excel_file = "Data Pasien";
    $this->export4excel($excel_content, $excel_file); 

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


             $transaction  = Yii::$app->db->beginTransaction();
            try {
                    Yii::$app->db->createCommand()
                    ->delete(Pasien::tableName(), ['id'=>$id])
                    ->execute();

                    Yii::$app->db->createCommand()
                    ->delete(RekamHeader::tableName(), ['id_pasien'=>$id])
                    ->execute();

                    Yii::$app->db->createCommand()
                    ->delete(DetailRekamMedis::tableName(), ['id_pasien'=>$id])
                    ->execute();

                    // ...other DB operations...
                    $transaction->commit();
                } catch(\Exception $e) {
                    $transaction->rollBack();
                    throw $e;
                }
             
             }
         
         return true;
   
       }


    /**
     * Displays a single Pasien model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function ary_obat(){
         return ArrayHelper::map(Obat::find()->all(),'kd_obat','nama_obat');
    }

    public function actionCreateRekammedis($id,$kd){
        $model = new PostRekamMedis();

        if ($model->load(Yii::$app->request->post())) {

             $model->saveDetailRekam();
            return $this->redirect(['review-pasien', 'id' => $model->id,'kd'=>$model->kd_pasien]);
        } else {
            return $this->renderAjax('_form_detail_rekam', [
                'model' => $model,
                'items'=>self::ary_obat(),
            ]);
        }

    }

     /**
     * Displays a single Pasien model.
     * @param string $id
     * @return mixed
     */
    public function actionReviewPasien($id)
    {

        if($id != ''){
            $cari = ['id_pasien'=> $id];
        }else{
             $cari = "";
        }

        $searchModel = new DetailRekamMedisSearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('reveiw', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }


    public function ary_agama(){
        return ArrayHelper::map(Agama::find()->all(),'id_agama','nama_agama');
    }

    /**
     * Creates a new Pasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pasien();

        $model_rekamheader = new RekamHeader();

        if ($model->load(Yii::$app->request->post())) {

            $transaction  = Yii::$app->db->beginTransaction();
            try {
                    $model->kd_pasien = Yii::$app->ambilkonci->getKey_pasien();
                    $model->user_create = Yii::$app->user->identity ->id;
                    $model->date_create = date('Y-m-d h:i:s');
                    $model->save();

                    $model_rekamheader->id_pasien = $model->id;
                    $model_rekamheader->kd_rekam_medis = Yii::$app->ambilkonci->getKey_rekamheader();
                    $model_rekamheader->date_create = date('Y-m-d h:i:s');
                    $model_rekamheader->save();
                    // ...other DB operations...
                    $transaction->commit();
                } catch(\Exception $e) {
                    $transaction->rollBack();
                    throw $e;
                }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'ary_agama'=>self::ary_agama(),
            ]);
        }
    }

    /**
     * Updates an existing Pasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pasien model.
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
     * Finds the Pasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
