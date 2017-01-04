<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\TypeObat */

$this->title = 'Update Type Obat: ' . $model->id_type;
$this->params['breadcrumbs'][] = ['label' => 'Type Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_type, 'url' => ['view', 'id' => $model->id_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-obat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
