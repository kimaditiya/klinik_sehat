<?php

namespace backend\stock\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\stock\models\StockObatheader;

/**
 * StockObatheaderSearch represents the model behind the search form about `backend\stock\models\StockObatheader`.
 */
class StockObatheaderSearch extends StockObatheader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_stock_header', 'tanggal_masuk_stock'], 'safe'],
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
        $query = StockObatheader::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tanggal_masuk_stock' => $this->tanggal_masuk_stock,
        ]);

        $query->andFilterWhere(['like', 'kd_stock_header', $this->kd_stock_header]);

        return $dataProvider;
    }
}
