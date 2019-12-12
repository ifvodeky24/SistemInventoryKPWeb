<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_barang_keluar".
 *
 * @property int $id_barang_keluar
 * @property int $id_barang_master
 * @property int $jumlah_barang
 * @property string $tanggal_keluar
 * @property string $tanggal_update
 *
 * @property TbBarangMaster $barangMaster
 */
class BarangKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_barang_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang_master', 'jumlah_barang'], 'required'],
            [['id_barang_master', 'jumlah_barang'], 'integer'],
            [['tanggal_keluar', 'tanggal_update'], 'safe'],
            [['id_barang_master'], 'exist', 'skipOnError' => true, 'targetClass' => BarangMaster::className(), 'targetAttribute' => ['id_barang_master' => 'id_barang_master']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang_keluar' => 'Id Barang Keluar',
            'id_barang_master' => 'Id Barang Master',
            'jumlah_barang' => 'Jumlah Barang',
            'tanggal_keluar' => 'Tanggal Keluar',
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
