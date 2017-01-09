<?php

namespace backend\payment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\payment\models\PembayaranHeader;

/**
 * PembayaranHeaderSearch represents the model behind the search form about `backend\payment\models\PembayaranHeader`.
 */
class PembayaranHeaderSearch extends PembayaranHeader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembayaran_header', 'tanggal_transaksi', 'date_create', 'date_update'], 'safe'],
            [['id_pasien', 'user_create', 'user_update'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PembayaranHeader::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pasien' => $this->id_pasien,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'date_create' => $this->date_create,
            'user_create' => $this->user_create,
            'date_update' => $this->date_update,
            'user_update' => $this->user_update,
        ]);

        $query->andFilterWhere(['like', 'id_pembayaran_header', $this->id_pembayaran_header]);

        return $dataProvider;
    }
}
