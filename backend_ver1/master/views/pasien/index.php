<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\View;
use kartik\widgets\Spinner;

/* @var $this yii\web\View */
/* @var $searchModel backend\master\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pasiens';
$this->params['breadcrumbs'][] = $this->title;

/*
 * Tombol Create
 *  create 
*/
function tombolCreate(){
      $title1 = Yii::t('app', 'New Pasien');
      $url = Url::toRoute(['/master/pasien/create']);
      $options1 = ['value'=>$url,
                    'id'=>'pasien-id-create',
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon1 = '<span class="fa fa-plus fa-lg"></span>';
      
      $label1 = $icon1 . ' ' . $title1;
      $content = Html::button($label1,$options1);
      return $content;
     }



 function tombolRefresh(){
      $title = Yii::t('app', 'Refresh');
      $url =  Url::toRoute(['/master/pasien/']);
      $options = ['id'=>'pasien-id-refresh',
                  'data-pjax' => 0,
                  'class'=>"btn btn-info btn-xs",
                ];
      $icon = '<span class="fa fa-history fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,$url,$options);
    }


    function tombolReview($url,$model){
      $title = Yii::t('app', 'Review');
      $url =  Url::toRoute(['/master/pasien/review-pasien','id'=>$model->id]);
      $options = ['id'=>'pasien-id-review',
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
        $url = Url::toRoute(['/master/pasien/view','id'=>$model->kd_pasien]);
        $options1 = ['value'=>$url,
                    'id'=>'view-pasien-id',
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
        $url = Url::toRoute(['/master/pasien/edit','id'=>$model->kd_pasien]);
        $options1 = ['value'=>$url,
                    'id'=>'edit-pasien-id',
                    'class'=>"btn btn-default btn-xs",      
                    'style'=>['width'=>'170px', 'height'=>'25px','border'=>'none','background-color'=>'white'],  
                ];
        $content = Html::button($label,$options1);
        return $content;
    }

    /*
   * Tombol Delete
  */
  function tombolDelete(){
      $title = Yii::t('app', 'Delete');
      $options = ['id'=>'pasien-id-delete',
                  'data-pjax' => 0,
                  'data-toggle-delete-erp'=>'pasien-delete',
                  'class'=>"btn btn-danger btn-xs",
                ];
      $icon = '<span class="fa fa-trash fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,'#',$options);
     
    }


     /*
   * Tombol export
  */
  function tombolExport(){
      $title = Yii::t('app', 'Export');
      $options = ['id'=>'pasien-id-export',
                  'data-pjax' => true,
                  'data-toggle-export-erp'=>'pasien-export',
                  'class'=>"btn btn-success btn-xs",
                ];
      $icon = '<span class="fa fa-file-excel-o fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,'#',$options);
     
    }

$loading_spinner = Spinner::widget(['preset' => 'large', 'align' => 'center','color' => 'blue', 'caption' => 'Loading','id'=>'tes','hidden'=>true]);


    /**
 * GRID Pasien
 * @author wawan  [aditiya@lukison.com]
 * @since 1.2
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'kd_pasien','SIZE' => '30px','label'=>'Kode Pasien','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'nama_pasien','SIZE' => '30px','label'=>'Nama Pasien','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>2, 'ATTR' =>['FIELD'=>'pekerjaan','SIZE' => '30px','label'=>'pekerjaan','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>3, 'ATTR' =>['FIELD'=>'agamaNama','SIZE' => '30px','label'=>'Agama','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    // ['ID' =>4, 'ATTR' =>['FIELD'=>'alamat','SIZE' => '30px','label'=>'Alamat','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>4, 'ATTR' =>['FIELD'=>'telp','SIZE' => '30px','label'=>'Telpon','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>5, 'ATTR' =>['FIELD'=>'nomer_alias_pasien','SIZE' => '30px','label'=>'Nomer Pasien Lama','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>6, 'ATTR' =>['FIELD'=>'status','SIZE' => '30px','label'=>'Status','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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
        return Yii::$app->controller->renderPartial('expand_row_pasien',[
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
  if($value[$key]['FIELD'] == 'status')
  {
    $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        'filter' => $valStt,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'value'=>function($model){
                   if ($model->status == 1) {
                        return Html::a('<i class="fa fa-check"></i> &nbsp;InActive', '',['class'=>'btn btn-success btn-xs', 'title'=>'InActive']);
                    } else if ($model->status == 0) {
                        return Html::a('<i class="fa fa-close"></i> &nbsp;Active', '',['class'=>'btn btn-danger btn-xs', 'title'=>'Active']);
                    }
                },
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
  }elseif($value[$key]['FIELD'] == 'agamaNama'){
    $attDinamik[]=[
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        'filter' => $data_agama,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
        'editableOptions' => [
              'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
              'size' => 'md',
              'options' => [
                'data' =>$data_agama,
                'pluginOptions' => [
                'allowClear' => true,
                
                ],
              ],    
          // Refresh Display
          'displayValueConfig' =>$data_agama,
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

  $gvpasien=GridView::widget([
  'id'=>'gv-pasien-id',
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
  'columns' => $attDinamik,
  'pjax'=>true,
  'pjaxSettings'=>[
    'options'=>[
        'enablePushState'=>false,
        'id'=>'gv-pasien-id',
    ],
  ],
  'panel' => [
        'heading'=>false,
        'type'=>'info',
        'before'=>$loading_spinner.tombolCreate().' '.tombolRefresh(),
        'showFooter'=>false,
  ],
  /* 'export' =>['target' => GridView::TARGET_BLANK],
  'exportConfig' => [
    GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
    GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
  ], */
  'toolbar'=> ['content'=>tombolDelete().' '.tombolExport(),
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
      <h3><i class="fa fa-address-book" aria-hidden="true"></i> <b><?= Html::encode('Menu Pasien')  ?></b></h3>
    </div>
</div>

<div class="pasien-index">

 
  <?= $gvpasien ?>



</div>

<?php

echo \Yii::$app->view->renderFile('@backend/master/views/pasien/modal_pasien.php'); // view modal


$urls = [
    'deleteurlpasien' => Url::toRoute(['/master/pasien/pilih-delete']),
    'exporturlpasien' =>  Url::toRoute(['/master/pasien/pilih-export'])
];

$this->registerJs(
    "var yiiOptionspasien = ".\yii\helpers\Json::htmlEncode($urls).";",
    View::POS_HEAD,
    'yiiOptionspasien'
);


$this->registerJs($this->render('all_pasien.js'),View::POS_READY);

?>
