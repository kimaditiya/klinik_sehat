<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\widgets\Select2;
use kartik\label\LabelInPlace;
/* @var $this yii\web\View */
/* @var $model backend\master\models\Obat */
/* @var $form yii\widgets\ActiveForm */

$config = ['template'=>"{input}\n{error}\n{hint}"];
?>

<div class="obat-form">

    <?php $form = ActiveForm::begin([
       'id'=>$model->formName(),
        'enableClientValidation' => true,

    ]); ?>


    <?= $form->field($model, 'nama_obat', $config)->widget(LabelInPlace::classname()) ?>

    <!-- $form->field($model, 'expired_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter expired date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'convertFormat' => true,
            'format' => 'yyyy-m-d h:i:s',
            // 'format'=>'yyyy-m-d h:i:s'
        ]
    ]) ?> -->

    <?= $form->field($model, 'id_type_obat')->widget(Select2::classname(), [
        'data' => $ary_type_obat,
        'options' => ['placeholder' => 'Select a type obat ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Type Obat') ?>

    <!--  $form->field($model, 'kd_jenis_obat')->widget(Select2::classname(), [
        'data' => $ary_jenis_obat,
        'options' => ['placeholder' => 'Select a jenis obat ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Jenis Obat') ?> -->


   <?= $form->field($model, 'description', $config)->widget(LabelInPlace::classname(), [
        'type' => LabelInPlace::TYPE_TEXT,
        'label'=>'<i class="glyphicon glyphicon-comment"></i> Description',
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
