<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\payment\models\PembayaranHeader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-header-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pembayaran_header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_transaksi')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'user_create')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_update')->textInput() ?>

    <?= $form->field($model, 'user_update')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
