<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangMasuk */

$this->title = 'Tambah Data Barang Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Data Barang Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
