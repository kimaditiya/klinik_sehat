<?php

use kartik\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model backend\master\models\Obat */

$this->title = $model->kd_obat;
$this->params['breadcrumbs'][] = ['label' => 'Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-view">


<?php
/*update obat*/
    $updateobat = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 

        ],
         [   //nama_obat
            'attribute' =>'kd_obat',
            'label'=>'kode obat',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //nama_obat
            'attribute' =>'nama_obat',
            'label'=>'nama obat',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [   //id_type_obat
            'attribute' =>'id_type_obat',
            'format'=>'raw',
            'value'=>$model->nametype,
            'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$data_type_obat,
                'options'=>['placeholder'=>'Select ...','id'=>'view-obat-type'],
                'pluginOptions'=>['allowClear'=>true],
            ],  
        ],
        //  [   //kd_jenis_obat
        //     'attribute' =>'kd_jenis_obat',
        //     'format'=>'raw',
        //     'value'=>$model->namejenis,
        //     'type'=>DetailView::INPUT_SELECT2,
        //     'widgetOptions'=>[
        //         'data'=>$data_jenis_obat,
        //         'options'=>['placeholder'=>'Select ...'],
        //         'pluginOptions'=>['allowClear'=>true],
        //     ],  
        // ],

        // [
        //     'attribute'=>'expired_date', 
        //     'format'=>'datetime',
        //     'type'=>DetailView::INPUT_DATETIME,
        //     'widgetOptions' => [
        //         'pluginOptions'=>['format'=>'yyyy-m-d h:i:s'],
        //     ],
        //     'valueColOptions'=>['style'=>'width:30%']
        // ],

        [
            'attribute'=>'status', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->status ? '<span class="label label-success">InActive</span>' : '<span class="label label-danger">Active</span>',
            'type'=>DetailView::INPUT_SWITCH,
            'widgetOptions' => [
            'options'=>['id'=>'sts_obat'],
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
        'id'=>'detail-data-obat-view-id',
        'model' => $model,
        'attributes'=>$updateobat,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Obat</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['/master/obat/delete','id'=>$model->kd_obat]),
        ],  
    ]);



?>



</div>
