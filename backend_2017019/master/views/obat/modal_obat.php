<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Modal::begin([    
         'id' => 'modalobat',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Obat').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentobat'></div>";
     Modal::end();


  Modal::begin([    
         'id' => 'modal-view-obats',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Obat').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentviewobats'></div>";
     Modal::end();


     Modal::begin([    
         'id' => 'modalobat-edit',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-edit"></div><div><h4 class="modal-title">'.Html::encode('Edi Obat').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentobatedit'></div>";
     Modal::end(); 

  Modal::begin([
      'id' => 'confirm-permission-alert-obat',
      'header' => '<div style="float:left;margin-right:10px">'. Html::img('@web/image/warning.jpg',  ['class' => 'pnjg', 'style'=>'width:40px;height:40px;']).'</div><div style="margin-top:10px;"><h4><b>Info Warning !</b></h4></div>',
      'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(142, 202, 223, 0.9)'
      ]
    ]);
    echo "<div>Anda belum memilih yang akan di hapus.
        <dl>
        </dl>
      </div>";
  Modal::end();
  
   Modal::begin([
      'id' => 'confirm-permission-alert-obat-delete',
      'header' => '<div style="margin-top:10px;"><h4><b>Confirmation !</b></h4></div>',
      // 'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(255,0,0,0.3)'
      ],
      'footer'=>'<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
            <button type="button" id="submit-obat" data-dismiss="modal" class="btn btn-success success"><i class="fa fa-check" aria-hidden="true"></i>Oke</button>',
    ]);
    echo "<div>Are you sure delete item ?
        <dl>
        </dl>
      </div>";
  Modal::end();

