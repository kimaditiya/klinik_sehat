<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\JenisObat */

// $this->title = 'Create Jenis Obat';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-obat-create">

    <!-- <h1 Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
