<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_barang_masuk".
 *
 * @property int $id_barang_masuk
 * @property int $id_barang_master
 * @property int $harga_barang
 * @property int $jumlah_barang
 * @property string $tanggal_masuk
 * @property string $tanggal_update
 *
 * @property TbBarangMaster $barangMaster
 */
class BarangMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_barang_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang_master', 'harga_barang', 'jumlah_barang'], 'required'],
            [['id_barang_master', 'harga_barang', 'jumlah_barang'], 'integer'],
            [['tanggal_masuk', 'tanggal_update'], 'safe'],
            [['id_barang_master'], 'exist', 'skipOnError' => true, 'targetClass' => BarangMaster::className(), 'targetAttribute' => ['id_barang_master' => 'id_barang_master']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang_masuk' => 'Id Barang Masuk',
            'id_barang_master' => 'Id Barang Master',
            'harga_barang' => 'Harga Barang',
            'jumlah_barang' => 'Jumlah Barang',
            'tanggal_masuk' => 'Tanggal Masuk',
            'tanggal_update' => 'Tanggal Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMaster()
    {
        return $this->hasOne(BarangMaster::className(), ['id_barang_master' => 'id_barang_master']);
    }
}
