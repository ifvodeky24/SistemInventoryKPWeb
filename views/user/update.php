<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Perbarui Data ' . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Master User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_lengkap, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Perbarui';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
