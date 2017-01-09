<?php

namespace backend\stock\models;

use Yii;

/**
 * This is the model class for table "stock_obatheader".
 *
 * @property string $kd_stock_header
 * @property string $tanggal_masuk_stock
 */
class StockObatheader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_obatheader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_stock_header'], 'required'],
            [['tanggal_masuk_stock'], 'safe'],
            [['date_create', 'date_update','user_create', 'user_update'], 'safe'],
            [['kd_stock_header'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_stock_header' => 'Kd Stock Header',
            'tanggal_masuk_stock' => 'Tanggal Masuk Stock',
        ];
    }
}
