<?php

use yii\helpers\Html;
use app\models\BarangMaster;

/* @var $this yii\web\View */
/* @var $model app\models\BarangMasuk */
$data = BarangMaster::find()
                ->where(['id_barang_master' => $model['id_barang_master']])
                ->one();

$this->title = 'Perbarui Data Barang Masuk ' . $data->nama_barang;
$this->params['breadcrumbs'][] = ['label' => 'Barang Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_barang_masuk, 'url' => ['view', 'id' => $model->id_barang_masuk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-masuk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
