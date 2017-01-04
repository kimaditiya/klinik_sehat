$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#obat-id-create', function(ehead){        
      $('#modalobat').modal('show')
      .find('#modalContentobat').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });

$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#view-obat-id-id', function(ehead){        
      $('#modal-view-obats').modal('show')
      .find('#modalContentviewobats').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });
    
    
$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#edit-obat-id', function(ehead){        
      $('#modalobat-edit').modal('show')
      .find('#modalContentobatedit').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });
    
$(document).on('click', '[data-toggle-delete-erp]', function(e){
  e.preventDefault();
  var keysSelect1 = $('#gv-obat-id').yiiGridView('getSelectedRows');
  if(keysSelect1 == ''){
     $('#confirm-permission-alert-obat').modal('show');
  }else{
     $('#confirm-permission-alert-obat-delete').modal('show');
   }
  $('#submit-obat').click(function(){
    $.ajax({
             url: yiiOptions.deleteurlobat,
             //cache: true,
             type: 'POST',
             data:{keysSelect:keysSelect1},
             dataType: 'json',
             success: function(result) {
               if (result == 1){
                   $.pjax.reload('#gv-obat-id');

               }
                else {
                  alert('Item already exists ');
                }
              }
            });
       });
  });
	