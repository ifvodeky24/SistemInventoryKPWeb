<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BarangKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_barang_keluar') ?>

    <?= $form->field($model, 'id_barang_master') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'harga_barang') ?>

    <?= $form->field($model, 'jumlah_barang') ?>

    <?php // echo $form->field($model, 'tanggal_keluar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
