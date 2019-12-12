<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_barang_master".
 *
 * @property int $id_barang_master
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $jenis_barang
 * @property string $satuan_barang
 * @property int $stok_barang
 * @property string $tanggal_update
 *
 * @property TbBarangKeluar[] $tbBarangKeluars
 * @property TbBarangMasuk[] $tbBarangMasuks
 */
class BarangMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_barang_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_barang', 'nama_barang', 'jenis_barang', 'satuan_barang', 'stok_barang'], 'required'],
            [['jenis_barang', 'satuan_barang'], 'string'],
            [['stok_barang'], 'integer'],
            [['tanggal_update'], 'safe'],
            [['kode_barang', 'nama_barang'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang_master' => 'Id Barang Master',
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'jenis_barang' => 'Jenis Barang',
            'satuan_barang' => 'Satuan Barang',
            'stok_barang' => 'Stok Barang',
            'tanggal_update' => 'Tanggal Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangKeluar()
    {
        return $this->hasMany(BarangKeluar::className(), ['id_barang_master' => 'id_barang_master']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMasuk()
    {
        return $this->hasMany(BarangMasuk::className(), ['id_barang_master' => 'id_barang_master']);
    }
}
