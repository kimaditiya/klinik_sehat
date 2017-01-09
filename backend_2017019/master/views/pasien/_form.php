<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\label\LabelInPlace;
use kartik\widgets\SwitchInput;
use kartik\widgets\TouchSpin;
use yii\web\JsExpression;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Obat */
/* @var $form yii\widgets\ActiveForm */

$config = ['template'=>"{input}\n{error}\n{hint}"];

$format = <<< SCRIPT
function format(jenisx) {
    if (!jenisx.id) return jenisx.text; // optgroup

    if(jenisx.id == 1){
         return '<i class="fa fa-male"></i>' +  jenisx.text;
    }else{
        return '<i class="fa fa-female"></i>' +  jenisx.text;
    }
   
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, View::POS_HEAD);

?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin([
       'id'=>$model->formName(),
        'enableClientValidation' => true,
        'enableAjaxValidation'=>true,
         'validationUrl'=>Url::toRoute('/master/pasien/valid-pasien')
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

     <?= $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
        'data' => $data_jeniskelamin,
        'options' => ['placeholder' => 'Select a jenis kelamin ...'],
        'pluginOptions' => [
            'templateResult' => new JsExpression('format'),
            'templateSelection' => new JsExpression('format'),
            'escapeMarkup' => $escape,
            'allowClear' => true
        ],
    ])->label('Jenis Kelamin') ?>

    <!--  $model->jenis_kelamin = true; ?>
     $form->field($model, 'jenis_kelamin')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'size' => 'large',
            'onText' => '<i class="fa fa-male" aria-hidden="true">Male</i>',
            'offText' => '<i class="fa fa-female" aria-hidden="true">Female</i>',
        ]]); ?> -->

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
