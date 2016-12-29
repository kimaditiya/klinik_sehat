$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#typeobat-id-create', function(ehead){        
      $('#modaltypeobat').modal('show')
      .find('#modalContenttypeobat').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });


$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#typeobat-id-view', function(ehead){        
      $('#modaltypeobat-view').modal('show')
      .find('#modalContenttypeobatview').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });


 $.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#typeobat-id-edit', function(ehead){        
      $('#modaltypeobat-edit').modal('show')
      .find('#modalContenttypeobatedit').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });


 $(document).on('click', '[data-toggle-delete-erp]', function(e){
  e.preventDefault();
  var keysSelect1 = $('#gv-type-obat-id').yiiGridView('getSelectedRows');
  if(keysSelect1 == '')
  {
    $('#confirm-permission-alert-type-obat').modal('show');
  }else{
  	 $('#confirm-permission-alert-type-obat-delete').modal('show');
  }

  $('#submit-type-obat').click(function(){

    $.ajax({
             url: yiiOptions.deleteurltypeobat,
             //cache: true,
             type: 'POST',
             data:{keysSelect:keysSelect1},
             dataType: 'json',
             success: function(result) {
               if (result == 1){
                   $.pjax.reload('#gv-type-obat-id');

               }
                else {
                  alert('error');
                }
              }
            });

       });

});

	