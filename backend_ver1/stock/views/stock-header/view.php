<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\stock\models\StockObatheader */

$this->title = $model->kd_stock_header;
$this->params['breadcrumbs'][] = ['label' => 'Stock Obatheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-obatheader-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kd_stock_header], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kd_stock_header], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_stock_header',
            'tanggal_masuk_stock',
        ],
    ]) ?>

</div>
