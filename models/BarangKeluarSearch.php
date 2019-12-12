<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BarangKeluar;

/**
 * BarangKeluarSearch represents the model behind the search form of `app\models\BarangKeluar`.
 */
class BarangKeluarSearch extends BarangKeluar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang_keluar', 'id_barang_master', 'id_user', 'harga_barang', 'jumlah_barang'], 'integer'],
            [['tanggal_keluar'], 'safe'],
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
        $query = BarangKeluar::find();

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
            'id_barang_keluar' => $this->id_barang_keluar,
            'id_barang_master' => $this->id_barang_master,
            'id_user' => $this->id_user,
            'harga_barang' => $this->harga_barang,
            'jumlah_barang' => $this->jumlah_barang,
            'tanggal_keluar' => $this->tanggal_keluar,
        ]);

        return $dataProvider;
    }
}
