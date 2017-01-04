<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\stock\models\StockObatheader */

$this->title = 'Create Stock Obatheader';
$this->params['breadcrumbs'][] = ['label' => 'Stock Obatheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-obatheader-create">

    <!-- <h1 Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
