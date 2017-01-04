

$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#agama-id-create', function(ehead){        
      $('#modal-agama').modal('show')
      .find('#modalContentagama').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });



$(document).on('click', '[data-toggle-delete-erp]', function(e){

  e.preventDefault();
  var keysSelect1 = $('#gv-agama-id').yiiGridView('getSelectedRows');

  if(keysSelect1 == '')
  {
    $('#confirm-permission-alert-agama').modal('show');
  }else{
    $('#confirm-permission-alert-agama-delete').modal('show');
  }

  $('#submit-agama').click(function(){
       /* when the submit button in the modal is clicked, submit the form */
       $.ajax({
               url: yiiOptions.deleteurlagama,
               //cache: true,
               type: 'POST',
               data:{keysSelect:keysSelect1},
               dataType: 'json',
               success: function(result) {
                 if (result == 1){
                     $.pjax.reload('#gv-agama-id');

                 }
                  else {
                    alert('error ');
                  }
                }
              });
        });     
})