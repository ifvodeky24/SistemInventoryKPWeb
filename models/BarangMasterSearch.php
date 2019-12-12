<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BarangMaster;

/**
 * BarangMasterSearch represents the model behind the search form of `app\models\BarangMaster`.
 */
class BarangMasterSearch extends BarangMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang_master', 'total_barang'], 'integer'],
            [['kode_barang', 'nama_barang', 'satuan_barang'], 'safe'],
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
        $query = BarangMaster::find();

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
            'id_barang_master' => $this->id_barang_master,
            'total_barang' => $this->total_barang,
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'satuan_barang', $this->satuan_barang]);

        return $dataProvider;
    }
}
