<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\label\LabelInPlace;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Agama */
/* @var $form yii\widgets\ActiveForm */
$config = ['template'=>"{input}\n{error}\n{hint}"];
?>

<div class="agama-form">

    <?php $form = ActiveForm::begin([
    	'id'=>$model->formName(),
    	'enableClientValidation' => true,
    ]); ?>

    <?=	$form->field($model, 'nama_agama', $config)->widget(LabelInPlace::classname()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
