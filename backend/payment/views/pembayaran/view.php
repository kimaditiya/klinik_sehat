<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\payment\models\PembayaranHeader */

$this->title = $model->id_pembayaran_header;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-header-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pembayaran_header], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pembayaran_header], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pembayaran_header',
            'id_pasien',
            'tanggal_transaksi',
            'date_create',
            'user_create',
            'date_update',
            'user_update',
        ],
    ]) ?>

</div>
