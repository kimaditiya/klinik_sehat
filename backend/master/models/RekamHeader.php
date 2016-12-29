<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "rekam_medis_header".
 *
 * @property string $kd_rekam_medis
 * @property string $kd_pasien
 */
class RekamHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rekam_medis_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_rekam_medis'], 'required'],
            [['kd_rekam_medis'], 'string', 'max' => 50],
            [['date_create','id_pasien'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_rekam_medis' => 'Kd Rekam Medis',
            'id_pasien' => 'id Pasien',
        ];
    }
}
