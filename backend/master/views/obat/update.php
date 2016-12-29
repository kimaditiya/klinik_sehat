<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Obat */

$this->title = 'Update Obat: ' . $model->kd_obat;
$this->params['breadcrumbs'][] = ['label' => 'Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_obat, 'url' => ['view', 'id' => $model->kd_obat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
