// modal create
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
		$(document).on('click','#pelayanan-id-create', function(ehead){ 			  
			$('#modalpelayanan').modal('show')
			.find('#modalContentpelayanan').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
			.load(ehead.target.value);
		});

// modal view
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
		$(document).on('click','#pelayanan-id-view', function(ehead){ 			  
			$('#modalpelayanan-view').modal('show')
			.find('#modalContentpelayananview').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
			.load(ehead.target.value);
		});

// modal edit
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
		$(document).on('click','#pelayanan-id-edit', function(ehead){ 			  
			$('#modalpelayanan-edit').modal('show')
			.find('#modalContentpelayananedit').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
			.load(ehead.target.value);
		});

// delete by ajax
$(document).on('click', '[data-toggle-delete-erp]', function(e){

  e.preventDefault();
  var keysSelect1 = $('#gv-pelayanan-id').yiiGridView('getSelectedRows');

  if(keysSelect1 == '')
  {
    $('#confirm-permission-alert-pelayanan').modal('show');
  }else{
    $('#confirm-permission-alert-pelayanan-delete').modal('show');
  }


   $('#submit-pelayanan').click(function(){
       /* when the submit button in the modal is clicked, submit the form */
       $.ajax({
               url: yiiOptions.deleteurlpelayanan,
               //cache: true,
               type: 'POST',
               data:{keysSelect:keysSelect1},
               dataType: 'json',
               success: function(result) {
                 if (result == 1){
                     $.pjax.reload('#gv-pelayanan-id');

                 }
                  else {
                    alert('error');
                  }
                }
              });
        });     
  });


	