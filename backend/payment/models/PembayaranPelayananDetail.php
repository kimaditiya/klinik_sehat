<?php

namespace backend\payment\models;

use Yii;

/**
 * This is the model class for table "pembayaran_pelayanan_detail".
 *
 * @property string $id
 * @property string $kd_header
 * @property string $id_pelayanan
 */
class PembayaranPelayananDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_pelayanan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_pelayanan'], 'integer'],
            [['kd_header'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_header' => 'Kd Header',
            'id_pelayanan' => 'Id Pelayanan',
        ];
    }
}
