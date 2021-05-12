<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kabupaten;

/**
 * KabupatenSearch represents the model behind the search form of `app\models\Kabupaten`.
 */
class KabupatenSearch extends Kabupaten
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kab', 'jmlh_penduduk', 'id_prov'], 'integer'],
            [['nama_kab'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Kabupaten::find();

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
            'id_kab' => $this->id_kab,
            'jmlh_penduduk' => $this->jmlh_penduduk,
            'id_prov' => $this->id_prov,
        ]);

        $query->andFilterWhere(['like', 'nama_kab', $this->nama_kab]);

        return $dataProvider;
    }
}
