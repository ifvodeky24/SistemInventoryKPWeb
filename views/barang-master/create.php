<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangMaster */

$this->title = 'Tambah Data Master Barang';
$this->params['breadcrumbs'][] = ['label' => 'Data Master Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
