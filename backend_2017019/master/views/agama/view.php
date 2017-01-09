<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Agama */

$this->title = $model->id_agama;
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_agama], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_agama], [
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
            'id_agama',
            'nama_agama',
        ],
    ]) ?>

</div>
