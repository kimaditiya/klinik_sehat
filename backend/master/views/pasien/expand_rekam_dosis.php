<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use backend\master\models\RekamdosisObatSearch;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\web\View;
use kartik\detail\DetailView;

 if($model1 != ''){
	 $cari = ['id_detail_medis'=> $model1->id];
  	}else{
     $cari = "";}
$searchModel_rekam_dosis = new RekamdosisObatSearch($cari);
$dataProvider = $searchModel_rekam_dosis->search(Yii::$app->request->queryParams);



  /**
 * GRID Pasien
 * @author wawan  [aditiya@lukison.com]
 * @since 1.2
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'obatNama','SIZE' => '30px','label'=>'Nama Obat','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'description_dosis','SIZE' => '30px','label'=>'Description Dosis ','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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


foreach($gvHeadColomnBT as $key =>$value[]){
 
      # code...
      $attDinamik[]=[
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

  /*GRIDVIEW ARRAY ACTION*/
  $actionClass='btn btn-info btn-xs';
  $actionLabel='Action';
  $attDinamik[]=[
    'class'=>'kartik\grid\ActionColumn',
    'dropdown' => true,
    'template' => '{delete}',
    'dropdownOptions'=>['class'=>'pull-right dropup','style'=>['disable'=>true]],
    'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
    'dropdownButton'=>[
      'class' => $actionClass,
      'label'=>$actionLabel,
      'caret'=>'<span class="caret"></span>',
    ],
     'buttons' => [
          'delete' => function ($url, $model) {
                  return tombolDeleteRekamDosis($url, $model);
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

 

   

  $gvdosis=GridView::widget([
  'id'=>'gv-rekam-dosis'.$model1->id,
  'dataProvider' => $dataProvider,
  // 'filterModel' => $searchModel,
  'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
  'columns' => $attDinamik,
  'pjax'=>true,
  'pjaxSettings'=>[
    'options'=>[
        'enablePushState'=>false,
        'id'=>'gv-rekam-dosis'.$model1->id,
    ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Dosis Obat</h3>',
            'type'=>GridView::TYPE_PRIMARY,
            'before'=>false,
            'footer'=>false,
            'after'=>tombolCreateDosis($model1)
  ],
  /* 'export' =>['target' => GridView::TARGET_BLANK],
  'exportConfig' => [
    GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
    GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
  ], */
  'toolbar'=> ['content'=>'',
        //'{export}',
    //'{items}',
  ],
  'hover'=>true, //cursor select
  'responsive'=>true,
  'responsiveWrap'=>true,
  'bordered'=>true,
  'striped'=>true,
]);


/*info*/
  $info=DetailView::widget([
    'model' => $model1,
    'attributes' => [
    [
        'attribute' =>'id_pasien',
        'value'=>$modelx->nama_pasien,
        'label'=>'Nama Pasien',
        'labelColOptions' => ['style' => 'text-align:right;width: 30%']
      ],
      [
        'attribute' =>'tanggal',
        'label'=>'Tanggal Periksa',
        'labelColOptions' => ['style' => 'text-align:right;width: 30%']
      ],
      [
        'attribute' =>'cek_fisik',
        'label'=>'Pemeriksaan Fisik',
        'labelColOptions' => ['style' => 'text-align:right;width: 30%']
      ],
      
    ],
  ]);
?>
<div class="row">
  <div  class="col-sm-12">
  <?= $info ?>
  </div>

</div>
<div class="row">
  <div  class="col-sm-12">
  <?= $gvdosis ?>
  </div>

</div>

