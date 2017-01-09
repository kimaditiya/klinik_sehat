<?php

namespace backend\master\models;

use Yii;
use backend\master\models\Obat;
/**
 * This is the model class for table "rekamdosis_obat".
 *
 * @property string $id_dosis
 * @property string $kd_obat
 * @property string $description_dosis
 * @property integer $status
 * @property string $user_create
 * @property string $date_create
 * @property string $user_update
 * @property string $date_update
 */
class RekamdosisObat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $id_type;
    public static function tableName()
    {
        return 'rekamdosis_obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_obat','description_dosis'], 'required'],
            [['description_dosis'], 'string'],
            [['status','id_pasien','id_detail_medis','user_create', 'user_update'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['kd_obat'], 'string', 'max' => 50],
            // [['user_create', 'user_update'], 'string', 'max' => 20],
        ];
    }

     public function getObatTbl(){
        return $this->hasOne(Obat::className(), ['kd_obat' => 'kd_obat']);
    }

     public function getObatNama(){
        return $this->obatTbl->nama_obat != ''? $this->obatTbl->nama_obat : 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dosis' => 'Id Dosis',
            'kd_obat' => 'Kd Obat',
            'description_dosis' => 'Description Dosis',
            'status' => 'Status',
            'user_create' => 'User Create',
            'date_create' => 'Date Create',
            'user_update' => 'User Update',
            'date_update' => 'Date Update',
        ];
    }
}
