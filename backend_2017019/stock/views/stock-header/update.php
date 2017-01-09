<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\stock\models\StockObatheader */

$this->title = 'Update Stock Obatheader: ' . $model->kd_stock_header;
$this->params['breadcrumbs'][] = ['label' => 'Stock Obatheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_stock_header, 'url' => ['view', 'id' => $model->kd_stock_header]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-obatheader-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
