<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;


 Modal::begin([    
         'id' => 'modal-rekam-detail',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Rekam Pasien').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentrekamdetail'></div>";
     Modal::end();



     Modal::begin([
      'id' => 'confirm-permission-alert-rekam-detail-delete',
      'header' => '<div style="float:left;margin-right:10px">'. Html::img('@web/image/warning.jpg',  ['class' => 'pnjg', 'style'=>'width:40px;height:40px;']).'</div><div style="margin-top:10px;"><h4><b>Info Warning !</b></h4></div>',
      'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(142, 202, 223, 0.9)'
      ],
    ]);
    echo "<div>Anda belum memilih yang akan di export.
        <dl>
        </dl>
      </div>";
  Modal::end();