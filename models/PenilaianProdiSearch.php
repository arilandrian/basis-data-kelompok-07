<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PenilaianProdi;

/**
 * PenilaianProdiSearch represents the model behind the search form of `app\models\PenilaianProdi`.
 */
class PenilaianProdiSearch extends PenilaianProdi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prodi_id', 'indikator_id'], 'integer'],
            [['tahun'], 'safe'],
            [['nilai'], 'number'],
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
        $query = PenilaianProdi::find();

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
            'prodi_id' => $this->prodi_id,
            'indikator_id' => $this->indikator_id,
            'nilai' => $this->nilai,
        ]);

        $query->andFilterWhere(['like', 'tahun', $this->tahun]);

        return $dataProvider;
    }
}
