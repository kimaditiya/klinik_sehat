<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\master\models\AgamaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agamas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-index">

   
</div>



<?php

/*
 * Tombol Create
 *  create 
*/
function tombolCreate(){
      $title1 = Yii::t('app', 'New Agama');
      $url = Url::toRoute(['/master/agama/create']);
      $options1 = ['value'=>$url,
                    'id'=>'agama-id-create',
                    'data-pjax' => 0,
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon1 = '<span class="fa fa-plus fa-lg"></span>';
      
      $label1 = $icon1 . ' ' . $title1;
      $content = Html::button($label1,$options1);
      return $content;
     }


 function tombolRefresh(){
      $title = Yii::t('app', 'Refresh');
      $url =  Url::toRoute(['/master/agama/']);
      $options = ['id'=>'agama-id-refresh',
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
      $options = ['id'=>'agama-id-delete',
                  'data-pjax' => 0,
                  'data-toggle-delete-erp'=>'agama-pilih-delete',
                  'class'=>"btn btn-danger btn-xs",
                ];
      $icon = '<span class="fa fa-trash fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,'#',$options);
     
    }
/**
 * GRID type obat
 * @author wawan  [aditiya@lukison.com]
 * @since 1.0
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'nama_agama','SIZE' => '30px','label'=>'Agama','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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


$gvagama=GridView::widget([
  'id'=>'gv-agama-id',
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
  'columns' => $attDinamik,
  'pjax'=>true,
  'pjaxSettings'=>[
    'options'=>[
        'enablePushState'=>false,
        'id'=>'gv-agama-id',
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
      <h3><i class="fa fa-address-card" aria-hidden="true"></i> <b><?= Html::encode('Menu Agama')  ?></b></h3>
    </div>
</div>

<?= $gvagama ?>

<?php
echo \Yii::$app->view->renderFile('@backend/master/views/agama/modal_agama.php'); // view modal

$urls = [
    'deleteurlagama' => Url::toRoute(['/master/agama/pilih-delete']),
];

$this->registerJs(
    "var yiiOptions = ".\yii\helpers\Json::htmlEncode($urls).";",
    View::POS_HEAD,
    'yiiOptions'
);

$this->registerJs($this->render('all_agama.js'),View::POS_READY);


