<?php
namespace common\components;

use Yii;
use yii\base\Component;

// models obat
use backend\master\models\Obat;
use backend\stock\models\StockObatheader;
use backend\master\models\Pasien;
use backend\master\models\RekamHeader;



class AmbilKeycodeComponent extends Component {

  /**
    *@author wawan
    *generate kd_obat
    *@return @var kd_obat
    */
   public function getKey_obat(){
     $ck = Obat::find()->where(['month(date_create)'=>date('m')])->max('kd_obat');
     $kd = explode('.',$ck);

      if (count($ck)==0){
        $nkd=1;
      }else{
        $nkd=$kd[3]+1;
      }
     

      $digit = str_pad($nkd,6,"0",STR_PAD_LEFT); //digit


      $kd_obat=  'O'. '.' . date("Y.m") . '.' .$digit;


      return $kd_obat;
    }

     /**
    *@author wawan
    *generate kd_stock header
    *@return @var kd_stock header
    */
   public function getKey_stock(){
     $ck = StockObatheader::find()->where(['month(date_create)'=>date('m')])->max('kd_stock_header');
     $kd = explode('.',$ck);

      if (count($ck)==0){
        $nkd=1;
      }else{
        $nkd=$kd[3]+1;
      }
     

      $digit = str_pad($nkd,6,"0",STR_PAD_LEFT); //digit


      $kd_stock=  'S'. '.' . date("Y.m") . '.' .$digit;


      return $kd_stock;
    }

  public function getKey_pasien(){
      $max_code = Pasien::find()->where(['month(date_create)'=>date('m')])->max('kd_pasien');
      $kd = explode('.',$max_code);

      if(count($max_code) == 0){
        $nkd = 1;
      }else{
        $nkd=$kd[3]+1;
      }

       $digit = str_pad($nkd,6,"0",STR_PAD_LEFT); //digit

       $kd_pasien = 'P'. '.' . date("Y.m") . '.' .$digit;

       return $kd_pasien;
    }


  public function getKey_rekamheader(){
      $max_code = RekamHeader::find()->where(['month(date_create)'=>date('m')])->max('kd_rekam_medis');
      $kd = explode('.',$max_code);

      if(count($max_code) == 0){
        $nkd = 1;
      }else{
        $nkd=$kd[3]+1;
      }

       $digit = str_pad($nkd,6,"0",STR_PAD_LEFT); //digit

       $kd_rkm = 'RKM'. '.' . date("Y.m") . '.' .$digit;

       return $kd_rkm;
    }

   
}


?>