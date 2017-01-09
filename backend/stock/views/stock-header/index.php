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
                  'class'=>"btn btn-warning btn-xs",
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


  function tombolReview($url,$model){
      $title = Yii::t('app', 'Review');
      $url =  Url::toRoute(['/stock/stock-header/review-stock','id'=>$model->kd_stock_header]);
      $options = ['id'=>'stock-header-id-review',
                  'data-pjax' => 0,
                  'class'=>"btn btn-default btn-xs",
                  'style'=>['width'=>'170px', 'height'=>'25px','border'=> 'none','background-color'=>'white'],
                ];
      $icon = '<span class="fa fa-history"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,$url,$options);
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
        'filterType'=>GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions'=>[
            'pluginOptions' => [
              // 'autoclose'=>true,
              // 'todayHighlight' => true,
              'convertFormat' => true,
              // 'useWithAddon'=>true,
               'showDropdowns'=>true,

             'locale'=>[
            'format'=>'YYYY-MM-D',
            'separator'=>' to ',
        ],

               // 'locale'=>['format' => 'y-m-d'],
              // 'locale'=>[
              //   'format'=>'d-M-y',
              //   'separator'=>' to ',
              // ],
              // 'format' => 'yyyy-m-d',
              // 'format'=>'yyyy-m-d h:i:s'
          ],
           'presetDropdown'=>true,
        ],
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


  /*GRIDVIEW ARRAY ACTION*/
  $actionClass='btn btn-info btn-xs';
  $actionLabel='Action';
  $attDinamik[]=[
    'class'=>'kartik\grid\ActionColumn',
    'dropdown' => true,
    'template' => '{review}',
    'dropdownOptions'=>['class'=>'pull-right dropup','style'=>['disable'=>true]],
    'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
    'dropdownButton'=>[
      'class' => $actionClass,
      'label'=>$actionLabel,
      'caret'=>'<span class="caret"></span>',
    ],
     'buttons' => [
          'review' => function ($url, $model) {
                  return tombolReview($url, $model);
                },
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

      

?>
<div class="row">
    <div class="col-md-3 col-md-offset-5">
      <h3><i class="fa fa-truck" aria-hidden="true"></i> <b><?= Html::encode('Menu Stock Obat')  ?></b></h3>
    </div>
</div>

<div class="stock-obatheader-index">
    <?= $gvstock_obat ?>
</div>
<?php

echo \Yii::$app->view->renderFile('@backend/stock/views/stock-header/modal_stock_header.php'); // view modal

$urls = [
    'deleteurlstockheader' => Url::toRoute(['/stock/stock-header/pilih-delete']),
];

$this->registerJs(
    "var yiiOptions = ".\yii\helpers\Json::htmlEncode($urls).";",
    View::POS_HEAD,
    'yiiOptions'
);

$this->registerJs($this->render('all_stock_header.js'),View::POS_READY);

?>

