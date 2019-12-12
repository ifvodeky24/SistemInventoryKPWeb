<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\BarangMaster;

/* @var $this yii\web\View */
/* @var $model app\models\BarangMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-masuk-form">

    <?php $form = ActiveForm::begin(); ?>

    <label>Nama Barang</label>

    <?php 
        $nama_barang = ArrayHelper::map(BarangMaster::find()->all(),'id_barang_master','nama_barang');
        echo $form->field($model, 'id_barang_master')->dropDownList($nama_barang,['prompt'=>'Pilih Nama Barang...'])->label(false);
    ?>

    <?= $form->field($model, 'harga_barang')->textInput() ?>

    <?= $form->field($model, 'jumlah_barang')->textInput() ?>

    <?= $form->field($model, 'tanggal_masuk')->textInput(['type'=> 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
