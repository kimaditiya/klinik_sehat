<?php





/*
 * GRID Jenis obat
 * @author wawan  [aditiya@lukison.com]
 * @since 1.2
*/

$attDinamik =[];


$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'jenis_obat','SIZE' => '30px','label'=>'Bentuk Obat','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'description','SIZE' => '30px','label'=>'Description','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>2, 'ATTR' =>['FIELD'=>'status','SIZE' => '30px','label'=>'Status','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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
        return Yii::$app->controller->renderPartial('expand_row_jenisobat',[
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
  }elseif($value[$key]['FIELD'] == 'description'){
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
        'editableOptions' => [
        'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA ,
        'size' => 'md',
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
    'template' => '{view}{update}',
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