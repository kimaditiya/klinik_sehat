<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\payment\models\PembayaranHeader */

$this->title = 'Update Pembayaran Header: ' . $model->id_pembayaran_header;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembayaran_header, 'url' => ['view', 'id' => $model->id_pembayaran_header]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-header-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
