<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\payment\models\PembayaranHeaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-header-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pembayaran_header') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'tanggal_transaksi') ?>

    <?= $form->field($model, 'date_create') ?>

    <?= $form->field($model, 'user_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'user_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
