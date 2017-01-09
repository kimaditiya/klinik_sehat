<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\Pelayanan;

/**
 * PelayananSearch represents the model behind the search form about `backend\master\models\Pelayanan`.
 */
class PelayananSearch extends Pelayanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelayanan', 'harga', 'status'], 'integer'],
            [['nama_pelayanan', 'description', 'user_create', 'date_create', 'user_update', 'date_update'], 'safe'],
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
        $query = Pelayanan::find();

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
            'id_pelayanan' => $this->id_pelayanan,
            'harga' => $this->harga,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'nama_pelayanan', $this->nama_pelayanan])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'user_create', $this->user_create])
            ->andFilterWhere(['like', 'user_update', $this->user_update]);

        return $dataProvider;
    }
}
