<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "agama".
 *
 * @property string $id_agama
 * @property string $nama_agama
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_agama'], 'string', 'max' => 225],
            [['nama_agama'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_agama' => 'Id Agama',
            'nama_agama' => 'Nama Agama',
        ];
    }
}
