<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\master\models\JenisObat */

$this->title = $model->id_type;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-obat-view">

    <?php
/*update Type obat*/
    $updattypeobat = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 

        ],
         [   //id_jenis_obat
            'attribute' =>'id_type',
            'label'=>'id Type obat',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //jenis_obat
            'attribute' =>'type_obat',
            'label'=>'Type obat',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [   //description
            'attribute' =>'description',
            'label'=>'Description',
            'type'=>DetailView::INPUT_TEXTAREA,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],

        [
            'attribute'=>'status', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->status ? '<span class="label label-success">InActive</span>' : '<span class="label label-danger">Active</span>',
            'type'=>DetailView::INPUT_SWITCH,
            'widgetOptions' => [
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
        'id'=>'detail-data-type-obat-edit-id',
        'model' => $model,
        'attributes'=>$updattypeobat,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}{delete}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Type Obat</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],

        'deleteOptions'=>[
                'url'=>Url::toRoute(['/master/type-obat/delete','id'=>$model->id_type]),
        ],  
    ]);



?>

</div>
