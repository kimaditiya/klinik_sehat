// modal create
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
		$(document).on('click','#jenisobat-id-create', function(ehead){ 			  
			$('#modaljenisobat').modal('show')
			.find('#modalContentjenisobat').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
			.load(ehead.target.value);
		});

// modal view
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
		$(document).on('click','#view-jenis-obat-id', function(ehead){ 			  
			$('#modal-jenisobat-view').modal('show')
			.find('#modalContentjenisobatview').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
			.load(ehead.target.value);
		});

// modal edit
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
		$(document).on('click','#edit-jenis-obat-id', function(ehead){ 			  
			$('#modal-jenisobat-edit').modal('show')
			.find('#modalContentjenisobatedit').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
			.load(ehead.target.value);
		});

// delete by ajax
$(document).on('click', '[data-toggle-delete-erp]', function(e){

  e.preventDefault();
  var keysSelect1 = $('#gv-jenis-obat-id').yiiGridView('getSelectedRows');

  if(keysSelect1 == '')
  {
    $('#confirm-permission-alert-jenis-obat').modal('show');
  }else{
     $('#confirm-permission-alert-jenis-obat-delete').modal('show');
  }

  $('#submit-jenis-obat').click(function(){

    $.ajax({
             url: yiiOptions.deleteurl,
             //cache: true,
             type: 'POST',
             data:{keysSelect:keysSelect1},
             dataType: 'json',
             success: function(result) {
               if (result == 1){
                   $.pjax.reload('#gv-jenis-obat-id');

               }
                else {
                  alert('Item already exists ');
                }
              }
            });

       });
  
  });


	