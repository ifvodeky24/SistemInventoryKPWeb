<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BarangMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_barang_master') ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'satuan_barang') ?>

    <?= $form->field($model, 'total_barang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
