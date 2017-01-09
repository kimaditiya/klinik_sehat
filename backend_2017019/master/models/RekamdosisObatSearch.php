<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\RekamdosisObat;
use yii\data\ArrayDataProvider;

/**
 * RekamdosisObatSearch represents the model behind the search form about `backend\master\models\RekamdosisObat`.
 */
class RekamdosisObatSearch extends RekamdosisObat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dosis', 'status'], 'integer'],
            [['kd_obat', 'description_dosis', 'user_create', 'date_create', 'user_update', 'date_update','id_detail_medis','id_pasien'], 'safe'],
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
        $query = RekamdosisObat::find()->where(['id_detail_medis'=>$this->id_detail_medis]);

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
            'id_dosis' => $this->id_dosis,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'kd_obat', $this->kd_obat])
            ->andFilterWhere(['like', 'description_dosis', $this->description_dosis])
            ->andFilterWhere(['like', 'user_create', $this->user_create])
            ->andFilterWhere(['like', 'user_update', $this->user_update]);

        return $dataProvider;
    }

    public function search_rekam_dosis($params)
    {
        $query = RekamdosisObat::find()->where(['id_detail_medis'=>$this->id_detail_medis])->asArray()->all();

        // add conditions that should always apply here

        $dataProvider = new ArrayDataProvider([
            'allModels' => $query,
        ]);

        return $dataProvider;
    }
}
