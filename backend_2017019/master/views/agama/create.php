<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\Agama */

$this->title = 'Create Agama';
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
