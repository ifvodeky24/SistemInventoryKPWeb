<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BarangMasuk;

/**
 * BarangMasukSearch represents the model behind the search form of `app\models\BarangMasuk`.
 */
class BarangMasukSearch extends BarangMasuk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang_masuk', 'id_barang_master', 'id_user', 'harga_barang', 'jumlah_barang'], 'integer'],
            [['tanggal_masuk'], 'safe'],
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
        $query = BarangMasuk::find();

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
            'id_barang_masuk' => $this->id_barang_masuk,
            'id_barang_master' => $this->id_barang_master,
            'id_user' => $this->id_user,
            'harga_barang' => $this->harga_barang,
            'jumlah_barang' => $this->jumlah_barang,
            'tanggal_masuk' => $this->tanggal_masuk,
        ]);

        return $dataProvider;
    }
}
