<?php

namespace backend\master\models;

use Yii;
use backend\sistem\models\Userlogin;

/**
 * This is the model class for table "pelayanan".
 *
 * @property string $id_pelayanan
 * @property string $nama_pelayanan
 * @property string $harga
 * @property string $description
 * @property integer $status
 * @property string $user_create
 * @property string $date_create
 * @property string $user_update
 * @property string $date_update
 */
class Pelayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelayanan';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_pelayanan','harga'], 'required'],
            [['harga', 'status','user_create', 'user_update'], 'integer'],
            [['description'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['nama_pelayanan'], 'string', 'max' => 225],
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
            'id_pelayanan' => 'Id Pelayanan',
            'nama_pelayanan' => 'Nama Pelayanan',
            'harga' => 'Harga',
            'description' => 'Description',
            'status' => 'Status',
            'user_create' => 'User Create',
            'date_create' => 'Date Create',
            'user_update' => 'User Update',
            'date_update' => 'Date Update',
        ];
    }
}
