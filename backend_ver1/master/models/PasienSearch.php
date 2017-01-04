<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\Pasien;

/**
 * PasienSearch represents the model behind the search form about `backend\master\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * @inheritdoc
     */
    public $agamaNama;
    public function rules()
    {
        return [
            [['id', 'id_agama', 'status', 'user_create', 'user_update'], 'integer'],
            [['kd_pasien', 'nama_pasien', 'pekerjaan', 'alamat', 'telp', 'date_create', 'date_update','agamaNama','nomer_alias_pasien'], 'safe'],
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
        $query = Pasien::find();

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
            'id' => $this->id,
            'id_agama' => $this->agamaNama,
            'status' => $this->status,
            'user_create' => $this->user_create,
            'user_update' => $this->user_update,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'kd_pasien', $this->kd_pasien])
            ->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'telp', $this->telp]);

        return $dataProvider;
    }
}
