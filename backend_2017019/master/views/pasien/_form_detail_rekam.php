<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\label\LabelInPlace;
use softark\duallistbox\DualListbox;
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


    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'convertFormat' => true,
            'format' => 'yyyy-mm-d',
            // 'format'=>'yyyy-m-d h:i:s'
        ]
    ]) ?>


    <?= $form->field($model, 'cek_fisik', $config)->widget(LabelInPlace::classname(), [
        'type' => LabelInPlace::TYPE_TEXT,
        'label'=>'<i class="glyphicon glyphicon-comment"></i> Cek Fisik',
        'encodeLabel'=>false,
        'options' => ['id'=>'ck-visik','class'=>'form-control'],
        'pluginOptions'=>[
            'labelPosition'=>'down',
            'labelArrowDown'=>' <i class="glyphicon glyphicon-chevron-down"></i>',
            'labelArrowUp'=>' <i class="glyphicon glyphicon-chevron-up"></i>',
            'labelArrowRight'=>' <i class="glyphicon glyphicon-chevron-right"></i>',
        ],

        ]) ?>



    <?php
    // $options = [
    //     'multiple' => true,
    //     'size' => 5,
    // ];
    // echo $form->field($model, $attribute)->listBox($items, $options);
    //  $form->field($model, 'k_obats')->widget(DualListbox::className(),[
    //     'items' => $items,
    //     'options' => $options,
    //     'clientOptions' => [
    //         'moveOnSelect' => false,
    //         'selectedListLabel' => 'Selected Items',
    //         'nonSelectedListLabel' => 'Available Items',
    //     ],
    // ])->label('Nama Obat');
?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
