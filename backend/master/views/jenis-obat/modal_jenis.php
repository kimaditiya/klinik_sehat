<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;

    #modal create
    Modal::begin([    
             'id' => 'modaljenisobat',   
             'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Bentuk Obat').'</h4></div>', 
         // 'size' => Modal::SIZE_, 
             'headerOptions'=>[   
                     'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
             ],   
         ]);    
        echo "<div id='modalContentjenisobat'></div>";
         Modal::end();

    #modal view
     Modal::begin([    
         'id' => 'modal-jenisobat-view',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Bentuk Obat').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentjenisobatview'></div>";
     Modal::end();

     #modal edit
     Modal::begin([    
         'id' => 'modal-jenisobat-edit',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-edit"></div><div><h4 class="modal-title">'.Html::encode('Edit Bentuk Obat').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentjenisobatedit'></div>";
     Modal::end();

     #modal confirmation item
     Modal::begin([
      'id' => 'confirm-permission-alert-jenis-obat',
      'header' => '<div style="float:left;margin-right:10px">'. Html::img('@web/image/warning.jpg',  ['class' => 'pnjg', 'style'=>'width:40px;height:40px;']).'</div><div style="margin-top:10px;"><h4><b>Info Warning !</b></h4></div>',
      'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(246, 140, 101, 1)'
      ]
    ]);
    echo "<div>Anda belum memilih yang akan di hapus.
        <dl>
        </dl>
      </div>";
  Modal::end(); 

 #modal confirmation delete
  Modal::begin([
      'id' => 'confirm-permission-alert-jenis-obat-delete',
      'header' => '<div style="margin-top:10px;"><h4><b>Confirmation !</b></h4></div>',
      // 'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(255,0,0,0.3)'
      ],
      'footer'=>'<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
            <button type="button" id="submit-jenis-obat" data-dismiss="modal" class="btn btn-success success"><i class="fa fa-check" aria-hidden="true"></i>Oke</button>',
    ]);
    echo "<div>Are you sure delete item ?
        <dl>
        </dl>
      </div>";
  Modal::end(); 