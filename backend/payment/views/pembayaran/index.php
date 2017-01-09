<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\payment\models\PembayaranHeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran Headers';
$this->params['breadcrumbs'][] = $this->title;


/*
 * Tombol Create
 *  create 
*/
function tombolCreate(){
      $title1 = Yii::t('app', 'New Pasien');
      $url = Url::toRoute(['/payment/pembayaran/create']);
      $options1 = ['value'=>$url,
                    'id'=>'payment-header-id-create',
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon1 = '<span class="fa fa-plus fa-lg"></span>';
      
      $label1 = $icon1 . ' ' . $title1;
      $content = Html::button($label1,$options1);
      return $content;
     }


    #tombol refesh
 function tombolRefresh(){
      $title = Yii::t('app', 'Refresh');
      $url =  Url::toRoute(['/payment/pembayaran/']);
      $options = ['id'=>'payment-header-id-refresh',
                  'data-pjax' => 0,
                  'class'=>"btn btn-warning btn-xs",
                ];
      $icon = '<span class="glyphicon glyphicon-refresh"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,$url,$options);
    }

     #tombol review
    function tombolReview($url,$model){
      $title = Yii::t('app', 'Review');
      $url =  Url::toRoute(['/payment/pembayaran/review','id'=>$model->id_pembayaran]);
      $options = ['id'=>'payment-header-id-review',
                  'data-pjax' => 0,
                  'class'=>"btn btn-default btn-xs",
                  'style'=>['width'=>'170px', 'height'=>'25px','border'=> 'none','background-color'=>'white'],
                ];
      $icon = '<span class="fa fa-history"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,$url,$options);
    }


  /*
   * Tombol View
  */
  function tombolView($url, $model){
        $title = Yii::t('app', 'View');
        $icon = '<span class="fa fa-eye"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/payment/pembayaran/view','id'=>$model->id_pembayaran]);
        $options1 = ['value'=>$url,
                    'id'=>'payment-header-id-view',
                    'class'=>"btn btn-default btn-xs",      
                    'style'=>['width'=>'170px', 'height'=>'25px','border'=> 'none','background-color'=>'white'],  
                ];
        $content = Html::button($label,$options1);
        return $content;
    }



 /*
   * Tombol Update
  */
  function tombolUpdate($url, $model){
        $title = Yii::t('app', 'Edit');
        $icon = '<span class="fa fa-edit"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/payment/pembayaran/update','id'=>$model->id_pembayaran]);
        $options1 = ['value'=>$url,
                    'id'=>'payment-header-edit-id',
                    'class'=>"btn btn-default btn-xs",      
                    'style'=>['width'=>'170px', 'height'=>'25px','border'=> 'none','background-color'=>'white'],  
                  ];
        $content = Html::button($label,$options1);
        return $content;
    }



    /*
   * Tombol Delete
  */
  function tombolDelete(){
      $title = Yii::t('app', 'Delete');
      $options = ['id'=>'payment-header-id-delete',
                  'data-pjax' => 0,
                  'data-toggle-delete-erp-payment-header'=>'payment-header-delete',
                  'class'=>"btn btn-danger btn-xs",
                ];
      $icon = '<span class="fa fa-trash fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,'#',$options);
     
    }




/**
 * GRID Pembayaran - header
 * @author wawan  [aditiya@lukison.com]
 * @since 1.2
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'id_pasien','SIZE' => '30px','label'=>'Nama Pasien','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'tanggal_transaksi','SIZE' => '30px','label'=>'Tanggal Transaksi','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ];

$gvHeadColomnBT = ArrayHelper::map($headColomnBT, 'ID', 'ATTR');



$attDinamik[] =[
  'class'=>'kartik\grid\SerialColumn',
  //'contentOptions'=>['class'=>'kartik-sheet-style'],
  'width'=>'10px',
  'header'=>'No.',
  'headerOptions'=>[
    'style'=>[
      'text-align'=>'center',
      'width'=>'10px',
      'font-family'=>'verdana, arial, sans-serif',
      'font-size'=>'9pt',
      'background-color'=>'rgba(73, 162, 182, 1)',
    ]
  ],
  'contentOptions'=>[
    'style'=>[
      'text-align'=>'center',
      'width'=>'10px',
      'font-family'=>'tahoma, arial, sans-serif',
      'font-size'=>'9pt',
    ]
  ],
];

$attDinamik[] =[
      'class'=>'kartik\grid\ExpandRowColumn',
      'width'=>'50px',
      'header'=>'Detail',
      'value'=>function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
      },
      'detail'=>function ($model, $key, $index, $column){
        return Yii::$app->controller->renderPartial('expand_row_payment',[
          'model1'=>$model,
        ]); 
      },
      'collapseTitle'=>'Close Exploler',
      'expandTitle'=>'Click to views detail',
      //'headerOptions'=>['class'=>'kartik-sheet-style'] ,
      // 'allowBatchToggle'=>true,
      'expandOneOnly'=>true,
      // 'enableRowClick'=>true,
      //'disabled'=>true,
      'headerOptions'=>[
        'style'=>[ 
          'text-align'=>'center',
          'width'=>'10px',
          'font-family'=>'tahoma, arial, sans-serif',
          'font-size'=>'7pt',
          'background-color'=>'rgba(73, 162, 182, 1)',
        ]
      ],
      'contentOptions'=>[
        'style'=>[
          'text-align'=>'center',
          'width'=>'10px',
          'height'=>'10px',
          'font-family'=>'tahoma, arial, sans-serif',
          'font-size'=>'7pt',
        ]
      ],
    ];

foreach($gvHeadColomnBT as $key =>$value[]){
 if($value[$key]['FIELD'] == 'namapasien'){
    $attDinamik[]=[
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        'filter' => $data_pasien,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
        'editableOptions' => [
              'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
              'size' => 'md',
              'options' => [
                'data' =>$data_pasien,
                'pluginOptions' => [
                'allowClear' => true,
                
                ],
              ],    
          // Refresh Display
          'displayValueConfig' =>$data_pasien,
        ],
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'noWrap'=>true,
        'headerOptions'=>[
            'style'=>[
                'text-align'=>'center',
                'width'=>$value[$key]['SIZE'],
                'font-family'=>'tahoma, arial, sans-serif',
                'font-size'=>'8pt',
                'background-color'=>'rgba('.$value[$key]['warna'].')',
            ]
        ],
        'contentOptions'=>[
            'style'=>[
                'width'=>$value[$key]['SIZE'],
                'text-align'=>$value[$key]['align'],
                'font-family'=>'tahoma, arial, sans-serif',
                'font-size'=>'8pt',
            ]
        ],
    ];

  }else{
      # code...
      $attDinamik[]=[
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filter'=>true,
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'noWrap'=>true,
        //'group'=>$value[$key]['grp'],
        'headerOptions'=>[
            'style'=>[
            'text-align'=>'center',
            'width'=>$value[$key]['SIZE'],
            'font-family'=>'tahoma, arial, sans-serif',
            'font-size'=>'8pt',
            'background-color'=>'rgba('.$value[$key]['warna'].')',
          ]
        ],
        'contentOptions'=>[
          'style'=>[
            'width'=>$value[$key]['SIZE'],
            'text-align'=>$value[$key]['align'],
            'font-family'=>'tahoma, arial, sans-serif',
            'font-size'=>'8pt',
          ]
        ],
      ];

    }

  };

  /*GRIDVIEW ARRAY ACTION*/
  $actionClass='btn btn-info btn-xs';
  $actionLabel='Action';
  $attDinamik[]=[
    'class'=>'kartik\grid\ActionColumn',
    'dropdown' => true,
    'template' => '{view}{update}{review}',
    'dropdownOptions'=>['class'=>'pull-right dropup','style'=>['disable'=>true]],
    'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
    'dropdownButton'=>[
      'class' => $actionClass,
      'label'=>$actionLabel,
      'caret'=>'<span class="caret"></span>',
    ],
     'buttons' => [
        /* View PO | Permissian All */
          'view' => function ($url, $model) {
                  return tombolView($url, $model);
                },
          'update' => function ($url, $model) {
                  return tombolUpdate($url, $model);
                },
          'review' => function($url,$model){
                  return tombolReview($url,$model);
          }
    ],
    'headerOptions'=>[
      'style'=>[
        'text-align'=>'center',
        'width'=>'10px',
        'font-family'=>'tahoma, arial, sans-serif',
        'font-size'=>'9pt',
        'background-color'=>'rgba(73, 162, 182, 1)',
      ]
    ],
    'contentOptions'=>[
      'style'=>[
        'text-align'=>'center',
        'width'=>'10px',
        'height'=>'10px',
        'font-family'=>'tahoma, arial, sans-serif',
        'font-size'=>'9pt',
      ]
    ],
  ];

   $attDinamik[]=[
      'class' => '\kartik\grid\CheckboxColumn',
      'contentOptions'=>['class'=>'kartik-sheet-style'],
      'width'=>'10px',
      // 'header'=>'No.',
      'headerOptions'=>[
        'style'=>[
          'text-align'=>'center',
          'width'=>'10px',
          'font-family'=>'verdana, arial, sans-serif',
          'font-size'=>'9pt',
          'background-color'=>'rgba(126, 189, 188, 0.9)',
        ]
      ],
      'contentOptions'=>[
        'style'=>[
          'text-align'=>'center',
          'width'=>'10px',
          'font-family'=>'tahoma, arial, sans-serif',
          'font-size'=>'8pt',
        ]
      ],
    ];

  $gvpayment_header=GridView::widget([
  'id'=>'gv-payment-header-id',
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
  'columns' => $attDinamik,
  'pjax'=>true,
  'pjaxSettings'=>[
    'options'=>[
        'enablePushState'=>false,
        'id'=>'gv-payment-header-id',
    ],
  ],
  'panel' => [
        'heading'=>false,
        'type'=>'info',
        'before'=>tombolCreate().' '.tombolRefresh(),
        'showFooter'=>false,
  ],
  /* 'export' =>['target' => GridView::TARGET_BLANK],
  'exportConfig' => [
    GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
    GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
  ], */
  'toolbar'=> ['content'=>tombolDelete(),
        //'{export}',
    //'{items}',
  ],
  'hover'=>true, //cursor select
  'responsive'=>true,
  'responsiveWrap'=>true,
  'bordered'=>true,
  'striped'=>true,
]);

?>

<div class="row">
    <div class="col-md-3 col-md-offset-5">
      <h3><i class="fa fa-address-book" aria-hidden="true"></i> <b><?= Html::encode('Menu Transaksi Pembayaran')  ?></b></h3>
    </div>
</div>

<div class="pembayaran-index">

 
  <?= $gvpayment_header ?>



</div>
