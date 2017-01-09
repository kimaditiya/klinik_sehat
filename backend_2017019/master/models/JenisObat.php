<?php

namespace backend\master\models;

use Yii;
use backend\sistem\models\Userlogin;

/**
 * This is the model class for table "jenis_obat".
 *
 * @property string $id_jenis_obat
 * @property string $jenis_obat
 * @property integer $status
 * @property string $user_create
 * @property string $date_create
 * @property string $user_update
 * @property string $date_update
 * @property string $description
 */
class JenisObat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','user_create', 'user_update'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['jenis_obat'],'required'],
            [['jenis_obat', 'description'], 'string', 'max' => 225],
            // [['user_create', 'user_update'], 'string', 'max' => 20],
        ];
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_obat' => 'Id Jenis Obat',
            'jenis_obat' => 'Bentuk Obat',
            'status' => 'Status',
            'user_create' => 'User Create',
            'date_create' => 'Date Create',
            'user_update' => 'User Update',
            'date_update' => 'Date Update',
            'description' => 'Description',
        ];
    }
}
