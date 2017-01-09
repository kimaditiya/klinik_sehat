<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\label\LabelInPlace;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\master\models\Obat */
/* @var $form yii\widgets\ActiveForm */

$config = ['template'=>"{input}\n{error}\n{hint}"];
?>

<div class="obat-form">

    <?php $form = ActiveForm::begin([
       'id'=>$model->formName(),
        'enableClientValidation' => true,
         'enableAjaxValidation'=>true,
         'validationUrl'=>Url::toRoute('/master/pasien/valid-dosis')
    ]); ?>



    <?= $form->field($model, 'id_type')->widget(Select2::classname(), [
            'data' => $data_type_obat,
            'options' => ['placeholder' => 'Select a type obat ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Type Obat') ?>

     <?= $form->field($model, 'kd_obat')->widget(DepDrop::classname(), [
        'type'=>DepDrop::TYPE_SELECT2,
        'options'=>['placeholder'=>'Select ...'],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['rekamdosisobat-id_type'],
            'url'=>Url::toRoute(['/master/pasien/list-obat']),
             'loadingText' => 'Loading  ...',
              'initialize' => true,
        ]
    ]) ?>



   <?= $form->field($model, 'description_dosis', $config)->widget(LabelInPlace::classname(), [
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

<?php
$this->registerJs("
   $('form#{$model->formName()}').on('beforeSubmit',function(e)
    {
        var \$form = $(this);
        $.post(
            \$form.attr('action'),
            \$form.serialize()
        )
            .done(function(result){
                    if(result == 1 ){
                        $('#modal-rekam-dosis').modal('hide');
                        $('form#{$model->formName()}').trigger('reset');
                        $.pjax.reload({container:'#gv-rekam-dosis{$kd}'});
                        }else{
                            console.log(result)
                        }
                    });
    return false;
});
 ",$this::POS_READY);
