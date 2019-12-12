<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BarangMaster;

/* @var $this yii\web\View */
/* @var $model app\models\BarangKeluar */

$data = BarangMaster::find()
                ->where(['id_barang_master' => $model['id_barang_master']])
                ->one();

$this->title = $data->nama_barang;
$this->params['breadcrumbs'][] = ['label' => 'Data Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barang-keluar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id_barang_keluar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_barang_keluar], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_barang_keluar',
            'barangMaster.nama_barang',
            'barangMaster.jenis_barang',
            'jumlah_barang',
            'barangMaster.satuan_barang',
            'tanggal_keluar',
            'tanggal_update',
        ],
    ]) ?>

</div>
