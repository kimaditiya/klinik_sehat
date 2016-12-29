<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\TypeObat */

$this->title = 'Create Type Obat';
$this->params['breadcrumbs'][] = ['label' => 'Type Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-obat-create">

    <!-- <h1Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
