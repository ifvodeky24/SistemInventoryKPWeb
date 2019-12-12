<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangKeluar */

$this->title = 'Tambah Data Barang Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Data Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-keluar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
