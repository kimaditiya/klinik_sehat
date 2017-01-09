<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\JenisObat;

/**
 * JenisObatSearch represents the model behind the search form about `backend\master\models\JenisObat`.
 */
class JenisObatSearch extends JenisObat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis_obat', 'status'], 'integer'],
            [['jenis_obat', 'user_create', 'date_create', 'user_update', 'date_update', 'description'], 'safe'],
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
        $query = JenisObat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_jenis_obat' => $this->id_jenis_obat,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'jenis_obat', $this->jenis_obat])
            ->andFilterWhere(['like', 'user_create', $this->user_create])
            ->andFilterWhere(['like', 'user_update', $this->user_update])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
