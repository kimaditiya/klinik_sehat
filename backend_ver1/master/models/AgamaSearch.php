<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\Agama;

/**
 * AgamaSearch represents the model behind the search form about `backend\master\models\Agama`.
 */
class AgamaSearch extends Agama
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agama'], 'integer'],
            [['nama_agama'], 'safe'],
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
        $query = Agama::find();

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
            'id_agama' => $this->id_agama,
        ]);

        $query->andFilterWhere(['like', 'nama_agama', $this->nama_agama]);

        return $dataProvider;
    }
}
