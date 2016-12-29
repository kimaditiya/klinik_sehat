<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>


<?= DetailView::widget([
        'model' => $model1,
        'id'=>'pasien-expand',
        'attributes' => [
            'kd_pasien',
             [
                'label'=>'Nomer Pasien Lama:',
                'value'=>$model1->nomer_alias_pasien,
            ],
            'nama_pasien',
            'alamat',
            'pekerjaan',
             [
                'label'=>'telpon:',
                'value'=>$model1->telp,
            ],
            [
                'label'=>'Jenis Kelamin:',
                'format'=>'raw',
                'value'=>$model1->jenis_kelamin ? '<i class="fa fa-male" aria-hidden="true"> Male </i>' : '<i class="fa fa-female" aria-hidden="true"> Female </i>' ,
            ],  
            [
                'label'=>'Agama:',
                'value'=>$model1->agamaNama,
            ],
            'riwayat_alergi',
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
        ],
    ]) ?>