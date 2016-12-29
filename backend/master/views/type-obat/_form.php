<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\label\LabelInPlace;

/* @var $this yii\web\View */
/* @var $model backend\master\models\TypeObat */
/* @var $form yii\widgets\ActiveForm */
$config = ['template'=>"{input}\n{error}\n{hint}"];
?>

<div class="type-obat-form">

    <?php $form = ActiveForm::begin([
    	'id'=>$model->formName(),
    	'enableClientValidation' => true,
    ]); ?>

    <?=	$form->field($model, 'type_obat', $config)->widget(LabelInPlace::classname()) ?>

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
