<?php

namespace backend\payment\models;

use Yii;

/**
 * This is the model class for table "pembayaran_header".
 *
 * @property string $id_pembayaran_header
 * @property string $id_pasien
 * @property string $tanggal_transaksi
 * @property string $date_create
 * @property string $user_create
 * @property string $date_update
 * @property string $user_update
 */
class PembayaranHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembayaran_header'], 'required'],
            [['id_pasien', 'user_create', 'user_update'], 'integer'],
            [['tanggal_transaksi', 'date_create', 'date_update'], 'safe'],
            [['id_pembayaran_header'], 'string', 'max' => 225],
        ];
    }

     public function getPasienTbl(){
        return $this->hasOne(Agama::className(), ['id_pasien' => 'id']);
    }

      public function getNamapasien(){
         return $this->pasienTbl != '' ? $this->pasienTbl->nama_pasien : 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran_header' => 'Id Pembayaran Header',
            'id_pasien' => 'Id Pasien',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'date_create' => 'Date Create',
            'user_create' => 'User Create',
            'date_update' => 'Date Update',
            'user_update' => 'User Update',
        ];
    }
}
