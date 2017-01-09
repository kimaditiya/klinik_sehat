<?php

namespace backend\payment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\payment\models\PembayaranObatDetail;

/**
 * PembayaranObatDetailSearch represents the model behind the search form about `backend\payment\models\PembayaranObatDetail`.
 */
class PembayaranObatDetailSearch extends PembayaranObatDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_detail_pembayaran'], 'integer'],
            [['kd_header_pembayaran', 'kd_obat'], 'safe'],
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
        $query = PembayaranObatDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_detail_pembayaran' => $this->id_detail_pembayaran,
        ]);

        $query->andFilterWhere(['like', 'kd_header_pembayaran', $this->kd_header_pembayaran])
            ->andFilterWhere(['like', 'kd_obat', $this->kd_obat]);

        return $dataProvider;
    }
}
