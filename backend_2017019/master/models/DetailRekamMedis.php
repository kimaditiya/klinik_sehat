<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "detail_rekam_medis".
 *
 * @property string $id
 * @property string $kd_rekam_medis
 * @property string $tanggal
 * @property string $cek_fisik
 * @property string $kd_obat
 * @property string $tindakan
 * @property integer $status
 */
class DetailRekamMedis extends \yii\db\ActiveRecord
{
    

    public static function tableName()
    {
        return 'detail_rekam_medis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['tanggal','cek_fisik'], 'required'],
            [['cek_fisik', 'tindakan'], 'string'],
            [['status','id_pasien'], 'integer'],
            [['kd_rekam_medis'], 'string', 'max' => 50],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_rekam_medis' => 'Kd Rekam Medis',
            'tanggal' => 'Tanggal',
            'cek_fisik' => 'Cek Fisik',
            'kd_obat' => 'Kd Obat',
            'tindakan' => 'Tindakan',
            'status' => 'Status',
        ];
    }
}
