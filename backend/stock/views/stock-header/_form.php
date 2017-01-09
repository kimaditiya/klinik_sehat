<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\stock\models\StockObatheader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-obatheader-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal_masuk_stock')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'convertFormat' => true,
            'format' => 'yyyy-mm-d',
            // 'format'=>'yyyy-m-d h:i:s'
        ]
    ]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
