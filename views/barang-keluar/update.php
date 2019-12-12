<?php

use yii\helpers\Html;
use app\models\BarangMaster;

/* @var $this yii\web\View */
/* @var $model app\models\BarangKeluar */
$data = BarangMaster::find()
                ->where(['id_barang_master' => $model['id_barang_master']])
                ->one();

$this->title = 'Perbarui Data Barang Keluar: ' . $data->nama_barang;
$this->params['breadcrumbs'][] = ['label' => 'Data Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_barang_keluar, 'url' => ['view', 'id' => $model->id_barang_keluar]];
$this->params['breadcrumbs'][] = 'Perbarui';
?>
<div class="barang-keluar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
