<?php

namespace backend\stock\models;

use Yii;

/**
 * This is the model class for table "stock_obatdetail".
 *
 * @property string $id_detailstock
 * @property string $kd_stock_header
 * @property string $kd_obat
 * @property string $source_obat
 * @property string $jumlah_stock
 * @property string $expired_date
 * @property string $jam_masukstock
 */
class StockObatdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_obatdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_obat', 'jumlah_stock'], 'integer'],
            [['expired_date', 'jam_masukstock'], 'safe'],
            [['kd_stock_header', 'kd_obat'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detailstock' => 'Id Detailstock',
            'kd_stock_header' => 'Kd Stock Header',
            'kd_obat' => 'Kd Obat',
            'source_obat' => 'Source Obat',
            'jumlah_stock' => 'Jumlah Stock',
            'expired_date' => 'Expired Date',
            'jam_masukstock' => 'Jam Masukstock',
        ];
    }
}
