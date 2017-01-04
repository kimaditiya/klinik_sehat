<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\JenisObat */

$this->title = 'Update Jenis Obat: ' . $model->id_jenis_obat;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_obat, 'url' => ['view', 'id' => $model->id_jenis_obat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-obat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
