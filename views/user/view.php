<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Master User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'username',
            'password',
            'nama_lengkap',
            'email:email',
            'alamat',
            'jabatan',
            'level',
            'jenis_kelamin',
            [
                'label'=>'foto_profil',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl()."/files/images/".$data['foto_profil'];
                    return Html::img($url,['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img', 'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
        ],
    ]) ?>

</div>
