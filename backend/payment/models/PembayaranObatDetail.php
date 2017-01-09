<?php

namespace backend\payment\models;

use Yii;

/**
 * This is the model class for table "pembayaran_obat_detail".
 *
 * @property string $id
 * @property string $id_detail_pembayaran
 * @property string $kd_header_pembayaran
 * @property string $kd_obat
 */
class PembayaranObatDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_obat_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_detail_pembayaran'], 'integer'],
            [['kd_header_pembayaran'], 'string', 'max' => 225],
            [['kd_obat'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_detail_pembayaran' => 'Id Detail Pembayaran',
            'kd_header_pembayaran' => 'Kd Header Pembayaran',
            'kd_obat' => 'Kd Obat',
        ];
    }
}
