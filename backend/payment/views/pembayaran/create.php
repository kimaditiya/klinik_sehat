<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\payment\models\PembayaranHeader */

$this->title = 'Create Pembayaran Header';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
