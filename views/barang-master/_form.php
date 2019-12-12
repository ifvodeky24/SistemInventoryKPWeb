<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BarangMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?php 
        $data_1 = [
            'Semen' => 'Semen', 
            'Pasir' => 'Pasir',
            'Split Setengah' => 'Split Setengah',
            'Split Medium' => 'Split Medium',
            'PC Wire' => 'PC Wire',
            'Spiral Wire' => 'Spiral Wire',
            'Kawat Ikat' => 'Kawat Ikat',
            'Besi D16' => 'Besi D16',
            'Pipa Setengah' => 'Pipa Setengah',
            'Baut Adre' => 'Baut Adre',
            'Mur' => 'Mur',
        ];

        echo $form->field($model, 'jenis_barang')->dropDownList($data_1,['prompt'=>'Pilih Jenis Barang...']);
    ?>

    <?php 
        $data_2 = [
            'Kg' => 'Kg', 'Ton' => 'Ton'
        ];

        echo $form->field($model, 'satuan_barang')->dropDownList($data_2,['prompt'=>'Pilih Satuan Barang...']);
    ?>

    <?= $form->field($model, 'stok_barang')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
