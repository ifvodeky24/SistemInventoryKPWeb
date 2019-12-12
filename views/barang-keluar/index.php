<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Barang Keluar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-keluar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kurangi Stok Barang', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Cetak Laporan', ['print-laporan'], ['class' => 'btn btn-warning']) ?>
    </p>



<div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Data Barang Keluar</h3> </center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th><center>No</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Jenis Barang</center></th>
                <th><center>Jumlah Barang</center></th>
                <th><center>Satuan Barang</center></th>
                <th><center>Tanggal Keluar</center></th>
                <th><center>Aksi</center></th>
            </tr>
            </thead>

            <tbody>
            
            <?php 
            $no=1;foreach($model as $db):

            ?>

             <tr>
                <td><center><?= $no; ?></center></td>
                <td><center><?=$db['nama_barang']?></center></td>
                <td><center><?=$db['jenis_barang']?></center></td>
                <td><center><?=$db['jumlah_barang']?></center></td>
                <td><center><?=$db['satuan_barang']?></center></td>
                <td><center><?=$db['tanggal_keluar']?></center></td>
                
                <td> <center>
                    <?=Html::a('<i class="fa fa-search"></i>', ['/barang-keluar/view', 'id' =>$db['id_barang_keluar']], ['class' => 'btn btn-warning  btn-xs']) ?>
                    <?=Html::a('<i class="fa fa-pencil"></i>', ['/barang-keluar/update', 'id' =>$db['id_barang_keluar']], ['class' => 'btn btn-info  btn-xs']) ?>
                    <?=Html::a('<i class="fa fa-trash"></i>', ['/barang-keluar/delete', 'id' =>$db['id_barang_keluar']], ['class' => 'btn btn-danger  btn-xs', 'data' => [ 'confirm' => 'anda yakin ingin menghapus"'.$db['id_barang_keluar'].'"?', 'method' => 'post',]]); ?>


                </center></td>
             </tr>

               <?php $no++;endforeach; ?>

             </tbody>
         </table>
    </div>
</div>

</div>
