<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>


<?= DetailView::widget([
        'model' => $model1,
        'attributes' => [
            'id_jenis_obat',
            'jenis_obat',
            [   'value'=>$model1->status ? '<span class="label label-success">InActive</span>' : '<span class="label label-danger">Active</span>',
                'format'=>'raw',
                'label'=>'Status'
            ],
             [
                'label'=>'User Create',
                'value'=>$model1->user_create ? $model1->pembuat:'none'
            ],
            'date_create',
            [
                'label'=>'User Update',
                'value'=>$model1->user_update ? $model1->pengUpdate:'Belum Di Update'
            ],
            [
                'label'=>'Date Update',
                'value'=>$model1->date_update ? $model1->date_update:'Belum Di Update'
            ],
            'description',
        ],
    ]) ?>