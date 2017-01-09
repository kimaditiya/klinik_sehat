<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Pasien */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-view">


    <?php

    /*edit pasien*/
    $edit_pasien = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 

        ],
         [   //kd_pasien
            'attribute' =>'kd_pasien',
            'label'=>'kode Pasien',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //nama_pasien
            'attribute' =>'nama_pasien',
            'label'=>'nama Pasien',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //pekerjaan
            'attribute' =>'pekerjaan',
            'label'=>'Pekerjaaan',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [   //id_agama
            'attribute' =>'id_agama',
            'format'=>'raw',
            'value'=>$model->agamaNama,
            'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$data_agama,
                'options'=>['placeholder'=>'Select ...','id'=>'edit-pasien-agama-id'],
                'pluginOptions'=>['allowClear'=>true],
            ],  
        ],
          [   //alamat
            'attribute' =>'alamat',
            'label'=>'Alamat',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //telp
            'attribute' =>'telp',
            'label'=>'Alamat',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],

        [
            'attribute'=>'status', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->status ? '<span class="label label-success">InActive</span>' : '<span class="label label-danger">Active</span>',
            'type'=>DetailView::INPUT_SWITCH,
            'widgetOptions' => [
            'options'=>['id'=>'sts_obat-edit'],
                'pluginOptions' => [
                    'onText' => 'InActive',
                    'offText' => 'Active',
                ]
            ],
            'valueColOptions'=>['style'=>'width:30%']
        ],
    ];

    /*Detail data View Editing*/
    echo $detail_data_view=DetailView::widget([
        'id'=>'detail-data-pasien-edit-id',
        'model' => $model,
        'attributes'=>$edit_pasien,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Pasien</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['/master/pasien/delete','id'=>$model->id]),
        ],  
    ]);


    ?>

</div>
