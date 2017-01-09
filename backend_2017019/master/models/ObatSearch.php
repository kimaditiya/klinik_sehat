<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\Obat;

/**
 * ObatSearch represents the model behind the search form about `backend\master\models\Obat`.
 */
class ObatSearch extends Obat
{
    /**
     * @inheritdoc
     */
    public $nametype;
    public function rules()
    {
        return [
            [['kd_obat', 'nama_obat', 'user_create', 'date_create', 'user_update', 'date_update', 'description','nametype'], 'safe'],
            [['id_type_obat', 'status'], 'integer'],
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
        $query = Obat::find();

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
            'id_type_obat' => $this->nametype,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'kd_obat', $this->kd_obat])
            ->andFilterWhere(['like', 'nama_obat', $this->nama_obat])
            ->andFilterWhere(['like', 'user_create', $this->user_create])
            ->andFilterWhere(['like', 'user_update', $this->user_update])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
