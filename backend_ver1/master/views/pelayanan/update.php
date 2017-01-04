<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\master\models\Pelayanan */

$this->title = $model->id_pelayanan;
$this->params['breadcrumbs'][] = ['label' => 'Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pelayanan-view">

    <?php
/*update pelayanan*/
    $updatpelayanan = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 

        ],
         [   //id_pelayanan
            'attribute' =>'id_pelayanan',
            'label'=>'id pelayanan',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //nama_pelayanan
            'attribute' =>'nama_pelayanan',
            'label'=>'Nama Pelayanan',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [   //nama_pelayanan
            'attribute' =>'harga',
            'label'=>'biaya',
            'value'=> Yii::$app->formatter->asDecimal($model->harga,2),
            'type'=>DetailView::INPUT_MONEY,
             'widgetOptions' => [
            'options'=>['id'=>'sts_pelayanan-money-edit'],
            ],
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
            'options'=>['id'=>'sts_pelayanan-edit'],
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
        'id'=>'detail-data-pelayanan-edit-id',
        'model' => $model,
        'attributes'=>$updatpelayanan,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}{delete}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>Pelayanan</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
        'deleteOptions'=>[
                'url'=>Url::toRoute(['/master/pelayanan/delete','id'=>$model->id_pelayanan]),
        ],   
    ]);



?>

</div>


