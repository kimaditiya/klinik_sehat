<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\stock\models\StockObatheaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Obatheaders';
$this->params['breadcrumbs'][] = $this->title;


/*
 * Tombol Create
 *  create 
*/
function tombolCreate(){
      $title1 = Yii::t('app', 'New Stock');
      $url = Url::toRoute(['/stock/stock-header/create']);
      $options1 = ['value'=>$url,
                    'id'=>'stock-id-create',
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon1 = '<span class="fa fa-plus fa-lg"></span>';
      
      $label1 = $icon1 . ' ' . $title1;
      $content = Html::button($label1,$options1);
      return $content;
     }


 function tombolRefresh(){
      $title = Yii::t('app', 'Refresh');
      $url =  Url::toRoute(['/stock/stock-header/']);
      $options = ['id'=>'stock-header-obat-id-refresh',
                  'data-pjax' => 0,
                  'class'=>"btn btn-info btn-xs",
                ];
      $icon = '<span class="fa fa-history fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,$url,$options);
    }



    /*
   * Tombol Delete
  */
  function tombolDelete(){
      $title = Yii::t('app', 'Delete');
      $options = ['id'=>'stock-header-id-delete',
                  'data-pjax' => 0,
                  'data-toggle-delete-erp'=>'stock-header-pilih-delete',
                  'class'=>"btn btn-danger btn-xs",
                ];
      $icon = '<span class="fa fa-trash fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,'#',$options);
     
    }

/**
 * GRID stock obat header
 * @author wawan  [aditiya@lukison.com]
 * @since 1.0
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'tanggal_masuk_stock','SIZE' => '30px','label'=>'Tanggal Masuk Stock','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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
        return Yii::$app->controller->renderPartial('expand_row_stock_obat',[
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

  };

 

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


$gvstock_obat=GridView::widget([
  'id'=>'gv-stok-header-obat-id',
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
  'columns' => $attDinamik,
  'pjax'=>true,
  'pjaxSettings'=>[
    'options'=>[
        'enablePushState'=>false,
        'id'=>'gv-stok-header-obat-id',
    ],
  ],
  'panel' => [
        'heading'=>false,
        'type'=>'info',
        'before'=> tombolCreate().' '.tombolRefresh(),
        'showFooter'=>false,
  ],
  /* 'export' =>['target' => GridView::TARGET_BLANK],
  'exportConfig' => [
    GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
    GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
  ], */
  'toolbar'=> [
      ['content'=>tombolDelete()],
        //'{export}',
    //'{items}',
  ],
  'hover'=>true, //cursor select
  'responsive'=>true,
  'responsiveWrap'=>true,
  'bordered'=>true,
  'striped'=>true,
]);

Modal::begin([    
         'id' => 'modalstock',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Stok Obat').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentstock'></div>";
  Modal::end();

      

?>
<div class="stock-obatheader-index">
    <?= $gvstock_obat ?>
</div>
<?php
$this->registerJs("$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#stock-id-create', function(ehead){        
      $('#modalstock').modal('show')
      .find('#modalContentstock').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });",View::POS_READY);




/** *js export if click then export 
    *@author adityia@lukison.com

**/
$this->registerJs("
$(document).on('click', '[data-toggle-delete-erp]', function(e){

  e.preventDefault();
  var keysSelect1 = $('#gv-stok-header-obat-id').yiiGridView('getSelectedRows');

  if(keysSelect1 == '')
  {
    alert('sorry your not selected item');
  }else{

  $.ajax({
           url: '".Url::toRoute(['/stock/stock-header/pilih-delete'])."',
           //cache: true,
           type: 'POST',
           data:{keysSelect:keysSelect1},
           dataType: 'json',
           success: function(result) {
             if (result == 1){
                 $.pjax.reload('#gv-type-obat-id');

             }
              else {
                alert('Item already exists ');
              }
            }
          });
        }

})

",$this::POS_READY);
?>

