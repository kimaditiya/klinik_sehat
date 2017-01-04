<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\label\LabelInPlace;
use kartik\widgets\SwitchInput;
use kartik\widgets\TouchSpin;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Obat */
/* @var $form yii\widgets\ActiveForm */

$config = ['template'=>"{input}\n{error}\n{hint}"];
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin([
       'id'=>$model->formName(),
        'enableClientValidation' => true,
    ]); ?>


    <?= $form->field($model, 'nama_pasien', $config)->widget(LabelInPlace::classname()) ?>

    <?= $form->field($model, 'pekerjaan', $config)->widget(LabelInPlace::classname()) ?>

    <?= $form->field($model, 'id_agama')->widget(Select2::classname(), [
        'data' => $data_agama,
        'options' => ['placeholder' => 'Select a Agama ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Agama') ?>

    <?= $form->field($model, 'alamat', $config)->widget(LabelInPlace::classname(), [
        'type' => LabelInPlace::TYPE_TEXT,
        'label'=>'<i class="glyphicon glyphicon-comment"></i> Alamat',
        'encodeLabel'=>false,
        'options' => ['class'=>'form-control'],
        'pluginOptions'=>[
            'labelPosition'=>'down',
            'labelArrowDown'=>' <i class="glyphicon glyphicon-chevron-down"></i>',
            'labelArrowUp'=>' <i class="glyphicon glyphicon-chevron-up"></i>',
            'labelArrowRight'=>' <i class="glyphicon glyphicon-chevron-right"></i>',
        ],

    ]) ?>

    <?= $form->field($model, 'telp', $config)->widget(LabelInPlace::classname()) ?>

    <?php $model->jenis_kelamin = true; ?>
    <?= $form->field($model, 'jenis_kelamin')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'size' => 'large',
            'onText' => '<i class="fa fa-male" aria-hidden="true">Male</i>',
            'offText' => '<i class="fa fa-female" aria-hidden="true">Female</i>',
        ]]); ?>

    <?= $form->field($model, 'umur')->widget(TouchSpin::classname(), [
            'options' => ['placeholder' => 'Umur ...'],
        ]); ?>

     <?= $form->field($model, 'riwayat_alergi', $config)->widget(LabelInPlace::classname(), [
        'type' => LabelInPlace::TYPE_TEXT,
        'label'=>'<i class="glyphicon glyphicon-comment"></i> riwayat alergi',
        'encodeLabel'=>false,
        'options' => ['class'=>'form-control'],
        'pluginOptions'=>[
            'labelPosition'=>'down',
            'labelArrowDown'=>' <i class="glyphicon glyphicon-chevron-down"></i>',
            'labelArrowUp'=>' <i class="glyphicon glyphicon-chevron-up"></i>',
            'labelArrowRight'=>' <i class="glyphicon glyphicon-chevron-right"></i>',
        ],

    ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
