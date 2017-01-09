<?php

namespace backend\master\models;

use Yii;
use backend\sistem\models\Userlogin;

/**
 * This is the model class for table "type_obat".
 *
 * @property string $id_type
 * @property string $type_obat
 * @property string $description
 * @property string $date_create
 * @property string $user_create
 * @property string $date_update
 * @property string $user_update
 * @property integer $status
 */
class TypeObat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['date_create', 'date_update','user_create', 'user_update'], 'safe'],
            [['status'], 'integer'],
            [['type_obat'], 'string', 'max' => 225],
            [['type_obat'],'required'],
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
            'id_type' => 'Id Type',
            'type_obat' => 'Type Obat',
            'description' => 'Description',
            'date_create' => 'Date Create',
            'user_create' => 'User Create',
            'date_update' => 'Date Update',
            'user_update' => 'User Update',
            'status' => 'Status',
        ];
    }
}
