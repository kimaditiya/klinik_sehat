<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Klinik Sehat';

?>



<!-- login custom admin lte -->
<div class="login-box">
     <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>
        <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>
          <div class="form-group has-feedback">
            <?= $form->field($model, 'username')->textInput(['class'=>'form-control', 'placeholder' => 'Username']);?>
          </div>
          <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder' => 'Password']) ?>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </label>
              </div>                        
            </div>
            <div class="col-xs-4">
              <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
          </div>
        </form>

         </div
      <?php ActiveForm::end(); ?>
