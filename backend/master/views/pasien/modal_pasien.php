
<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;




Modal::begin([    
         'id' => 'modalpasien',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Pasien').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentpasien'></div>";
     Modal::end();


Modal::begin([    
         'id' => 'modalpasien-edit',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-edit"></div><div><h4 class="modal-title">'.Html::encode('Edit Pasien').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentpasienedit'></div>";
     Modal::end();

Modal::begin([    
         'id' => 'modalpasien-view',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Pasien').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentpasienview'></div>";
     Modal::end();

Modal::begin([
      'id' => 'confirm-permission-alert-pasien',
      'header' => '<div style="float:left;margin-right:10px">'. Html::img('@web/image/warning.jpg',  ['class' => 'pnjg', 'style'=>'width:40px;height:40px;']).'</div><div style="margin-top:10px;"><h4><b>Info Warning !</b></h4></div>',
      'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(142, 202, 223, 0.9)'
      ],
    ]);
    echo "<div>Anda belum memilih yang akan di hapus.
        <dl>
        </dl>
      </div>";
  Modal::end();


  Modal::begin([
      'id' => 'confirm-permission-alert-pasien-export',
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


  Modal::begin([
      'id' => 'confirm-permission-alert-pasien-export-warning',
      'header' => '<div style="margin-top:10px;"><h4><b>Confirmation !</b></h4></div>',
      // 'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgb(255, 128, 0)'
      ],
      'footer'=>'<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
            <button type="button" id="submit-pasien-export" data-dismiss="modal" class="btn btn-success success"><i class="fa fa-check" aria-hidden="true"></i>Oke</button>',
    ]);
    echo "<div>Are you sure export excel item ?
        <dl>
        </dl>
      </div>";
  Modal::end();


  Modal::begin([
      'id' => 'confirm-permission-alert-pasien-delete',
      'header' => '<div style="margin-top:10px;"><h4><b>Confirmation !</b></h4></div>',
      // 'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(255,0,0,0.3)'
      ],
      'footer'=>'<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
            <button type="button" id="submit-pasien" data-dismiss="modal" class="btn btn-success success"><i class="fa fa-check" aria-hidden="true"></i>Oke</button>',
    ]);
    echo "<div>Are you sure delete item ?
        <dl>
        </dl>
      </div>";
  Modal::end();


