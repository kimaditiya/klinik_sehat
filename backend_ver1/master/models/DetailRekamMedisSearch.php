<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\DetailRekamMedis;

/**
 * DetailRekamMedisSearch represents the model behind the search form about `backend\master\models\DetailRekamMedis`.
 */
class DetailRekamMedisSearch extends DetailRekamMedis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['kd_rekam_medis', 'tanggal', 'cek_fisik', 'kd_obat', 'tindakan'], 'safe'],
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
        $query = DetailRekamMedis::find()->where(['kd_rekam_medis'=>$this->kd_rekam_medis]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false
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
            'tanggal' => $this->tanggal,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'kd_rekam_medis', $this->kd_rekam_medis])
            ->andFilterWhere(['like', 'cek_fisik', $this->cek_fisik])
            ->andFilterWhere(['like', 'kd_obat', $this->kd_obat])
            ->andFilterWhere(['like', 'tindakan', $this->tindakan]);

        return $dataProvider;
    }
}
