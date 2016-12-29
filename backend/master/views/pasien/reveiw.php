
<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\View;



$this->title = 'Rekam Medis';
$this->params['breadcrumbs'][] = $this->title;

/*
 * Tombol Create
 *  create 
*/
function tombolCreate($model){
      $title1 = Yii::t('app', 'New');
      $url = Url::toRoute(['/master/pasien/create-rekammedis','id'=>$model->id,'kd'=>$model->kdRekamheader]);
      $options1 = ['value'=>$url,
                    'id'=>'rekam-detail-id-create',
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon1 = '<span class="fa fa-plus fa-lg"></span>';
      
      $label1 = $icon1 . ' ' . $title1;
      $content = Html::button($label1,$options1);
      return $content;
     }



  /*
   * Tombol Delete
  */
  function tombolDelete(){
      $title = Yii::t('app', 'Delete');
      $options = ['id'=>'rekam-detail-id-delete',
                  'data-pjax' => 0,
                  'data-toggle-delete-erp'=>'rekam-delete',
                  'class'=>"btn btn-danger btn-xs",
                ];
      $icon = '<span class="fa fa-trash fa-lg"></span>';
      $label = $icon . ' ' . $title;

      return $content = Html::a($label,'#',$options);
     
    }


 /**
 * GRID Pasien
 * @author wawan  [aditiya@lukison.com]
 * @since 1.2
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'tanggal','SIZE' => '30px','label'=>'Tanggal','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'cek_fisik','SIZE' => '30px','label'=>'Anamnese&Pemeriksaan fisik','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>2, 'ATTR' =>['FIELD'=>'kd_obat','SIZE' => '30px','label'=>'Obat','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>3, 'ATTR' =>['FIELD'=>'tindakan','SIZE' => '30px','label'=>'Tindakan','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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

  $gvpasien=GridView::widget([
  'id'=>'gv-rekam-detail-id',
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
  'columns' => $attDinamik,
  'pjax'=>true,
  'pjaxSettings'=>[
    'options'=>[
        'enablePushState'=>false,
        'id'=>'gv-rekam-detail-id',
    ],
  ],
  'panel' => [
        'heading'=>false,
        'type'=>'info',
        'before'=> tombolCreate($model),
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
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt;">
	<div  class="row">
	<!-- HEADER !-->
		<div class="col-md-12" style="background-color: lightblue;">
			<div class="col-md-1" style="float:left;">
				<?php echo Html::img('@web/image/logo_klinik1.jpg',  ['class' => 'img-circle', 'style'=>'width:100px;height:70px;']); ?>
			</div>
			<div class="col-md-9" style="padding-top:15px;">
				<h3 class="text-center"><b> Rekam Medis Pasien</b></h3>
			</div>
			<div class="col-md-12" style="padding-left:0px;">
				<hr style="height:10px;margin-top: 1px; margin-bottom: 1px;color:#94cdf0">
			</div>

		</div>
	</div>

		<div  class="row">
			<div class="col-md-12" style="font-family: tahoma ;font-size: 9pt;float:left;">
				<div class="col-md-4">
				<dl>
				    <dt style="width:80px; float:left;">Kode Pasien</dt>
				    <dd>: <b><?= $model->kd_pasien ?></b> </dd>
					<dt style="width:80px; float:left;">Nama</dt>
					<dd>: <b><?= $model->nama_pasien ?> </b></dd>
					<dt style="width:80px; float:left;">Alamat </dt>
					<dd>: <b> <?= $model->alamat ?></b> </dd>
					<dt style="width:80px; float:left;">TLP</dt>
					<dd>: <b><?= $model->telp ?></b> </dd>
				</dl>
			</div>
				<div class="col-md-4"></div>
			<div class="col-md-4">
				<dl>
					<dt style="width:80px; float:left;">Alamat</dt>
				    <dd>: <b>JL.H.Garif II(lapangan Merah)</b> </dd>
					<dt style="width:80px; float:left;">RT/RW</dt>
					<dd>: <b>02/04 No.124 </b></dd>
					<dt style="width:80px; float:left;">Kelurahan</dt>
					<dd>: <b> Pondok Aren</b> </dd>
					<dt style="width:80px; float:left;">TLP</dt>
					<dd>: <b>(021)32227218</b> </dd>
				</dl>
			</div>

			</div>
		</div>

	<div  class="row">
		<div class="ccol-md-12"  style="float:none">

			<div class="col-md-12">

				<?php echo $gvpasien;?>
			</div>
		</div>
	</div>
</div>

<?php
echo \Yii::$app->view->renderFile('@backend/master/views/pasien/modal_rekam_detail.php'); // view modal

$this->registerJs($this->render('all_rekam_detail.js'),View::POS_READY);