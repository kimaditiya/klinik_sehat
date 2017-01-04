$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#stock-id-create', function(ehead){        
      $('#modalstock').modal('show')
      .find('#modalContentstock').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });



$(document).on('click', '[data-toggle-delete-erp]', function(e){

  e.preventDefault();
  var keysSelect1 = $('#gv-stok-header-obat-id').yiiGridView('getSelectedRows');

  if(keysSelect1 == '')
  {
  	 $('#confirm-permission-alert-stock-header').modal('show')
     
  }else{
  	$('#confirm-permission-alert-stock-header-delete').modal('show')
  }

	  $('#submit-stock-header').click(function(){
	       /* when the submit button in the modal is clicked, submit the form */
	       $.ajax({
	               url: yiiOptions.deleteurlstockheader,
	               //cache: true,
	               type: 'POST',
	               data:{keysSelect:keysSelect1},
	               dataType: 'json',
	               success: function(result) {
	                 if (result == 1){
	                     $.pjax.reload('#gv-stok-header-obat-id');

	                 }else {
	                    alert('error ');
	                  }
	                }
	              });
	        });     

	})
