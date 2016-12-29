<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\Pelayanan */

$this->title = 'Create Pelayanan';
$this->params['breadcrumbs'][] = ['label' => 'Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelayanan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
