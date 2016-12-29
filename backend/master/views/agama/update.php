<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Agama */

$this->title = 'Update Agama: ' . $model->id_agama;
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agama, 'url' => ['view', 'id' => $model->id_agama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agama-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
