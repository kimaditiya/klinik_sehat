<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\TypeObat;

/**
 * TypeObatSearch represents the model behind the search form about `backend\master\models\TypeObat`.
 */
class TypeObatSearch extends TypeObat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_type', 'status'], 'integer'],
            [['type_obat', 'description', 'date_create', 'user_create', 'date_update', 'user_update'], 'safe'],
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
        $query = TypeObat::find();

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
            'id_type' => $this->id_type,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'type_obat', $this->type_obat])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'user_create', $this->user_create])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'user_update', $this->user_update]);

        return $dataProvider;
    }
}
