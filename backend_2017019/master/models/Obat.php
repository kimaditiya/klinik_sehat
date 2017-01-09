<?php

namespace backend\master\models;

use Yii;
use backend\sistem\models\Userlogin;

/**
 * This is the model class for table "obat".
 *
 * @property string $kd_obat
 * @property string $id_type_obat
 * @property string $nama_obat
 * @property string $expired_date
 * @property string $kd_jenis_obat
 * @property integer $status
 * @property string $user_create
 * @property string $date_create
 * @property string $user_update
 * @property string $date_update
 * @property string $description
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_obat','id_type_obat','nama_obat'], 'required'],
            [['id_type_obat', 'status'], 'integer'],
            [['date_create', 'date_update','user_create', 'user_update'], 'safe'],
            [['description'], 'string'],
            [['kd_obat'], 'string', 'max' => 50],
            [['nama_obat'], 'string', 'max' => 225],
            // [['user_create', 'user_update'], 'string', 'max' => 20],
        ];
    }

    public function getTypeTbl(){
        return $this->hasOne(TypeObat::className(), ['id_type' => 'id_type_obat']);
    }

    public function getUserTbl1(){
        return $this->hasOne(Userlogin::className(), ['id' => 'user_create']);
    }

    public function getUserTbl2(){
        return $this->hasOne(Userlogin::className(), ['id' => 'user_update']);
    }

    public function getPembuat(){
        return $this->userTbl1 != ''? $this->userTbl1->username:'none';
    }

     public function getPengupdate(){
        return $this->userTbl2 != ''? $this->userTbl2->username:'none';
    }


    public function getNametype(){
        return $this->typeTbl != '' ? $this->typeTbl->type_obat : 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_obat' => 'Kd Obat',
            'id_type_obat' => 'Id Type Obat',
            'nama_obat' => 'Nama Obat',
            'status' => 'Status',
            'user_create' => 'User Create',
            'date_create' => 'Date Create',
            'user_update' => 'User Update',
            'date_update' => 'Date Update',
            'description' => 'Description',
        ];
    }
}
