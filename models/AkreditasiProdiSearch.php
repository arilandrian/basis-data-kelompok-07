<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AkreditasiProdi;

/**
 * AkreditasiProdiSearch represents the model behind the search form of `app\models\AkreditasiProdi`.
 */
class AkreditasiProdiSearch extends AkreditasiProdi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prodi_id', 'lembaga_akreditasi_id'], 'integer'],
            [['akreditasi_id', 'tanggal_mulai', 'tanggal_akhir', 'no_sk', 'lembaga_akreditasi', 'file'], 'safe'],
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
        $query = AkreditasiProdi::find();

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
            'id' => $this->id,
            'prodi_id' => $this->prodi_id,
            'lembaga_akreditasi_id' => $this->lembaga_akreditasi_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);

        $query->andFilterWhere(['like', 'akreditasi_id', $this->akreditasi_id])
            ->andFilterWhere(['like', 'no_sk', $this->no_sk])
            ->andFilterWhere(['like', 'lembaga_akreditasi', $this->lembaga_akreditasi])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
