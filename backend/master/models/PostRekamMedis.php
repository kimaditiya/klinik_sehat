<?php

namespace  backend\master\models;

use yii\base\Model;

class PostRekamMedis extends Model
{
    /**
     * @var datetime
     */
    public $tgl;

     /**
     * @var string
     */
    public $ck_fisik;

    /**
     * @var array kd_obats 
     */
    public $k_obats = [];

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['tgl','ck_fisik','k_obats'], 'safe'],
            [['tgl','ck_fisik','k_obats'], 'required'],
        ];
    }

   

    /**
     * save the user's favorite foods
     */
    public function saveDetailRekam()
    {
       
            if (is_array($this->k_obats)) {
                $implode_obat = implode(',', $this->k_obats);
            }
       
    }

}