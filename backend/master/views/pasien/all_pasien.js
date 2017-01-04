
$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#pasien-id-create', function(ehead){        
      $('#modalpasien').modal('show')
      .find('#modalContentpasien').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });

$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#view-pasien-id', function(ehead){        
      $('#modalpasien-view').modal('show')
      .find('#modalContentpasienview').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });


$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#edit-pasien-id', function(ehead){        
      $('#modalpasien-edit').modal('show')
      .find('#modalContentpasienedit').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });



 $(document).on('click', '[data-toggle-delete-erp-pasien]', function(e){

	  e.preventDefault();
	  var keysSelect1 = $('#gv-pasien-id').yiiGridView('getSelectedRows');

	  if(keysSelect1 == ''){
	    	$('#confirm-permission-alert-pasien').modal('show');
	  }else{
	     	$('#confirm-permission-alert-pasien-delete').modal('show');
		}

	    $('#submit-pasien').click(function(){
	     /* when the submit button in the modal is clicked, submit the form */
	     $.ajax({
	             url: yiiOptionspasien.deleteurlpasien,
	             //cache: true,
	             type: 'POST',
	             data:{keysSelect:keysSelect1},
	             dataType: 'json',
	             beforeSend: function() {
	        		$("#pasien-loading-id").show();
            		},
            	 complete: function(){
     				$("#pasien-loading-id").hide();
  				 	}, 
	             success: function(result) {
	               if (result == 1){
	                   $.pjax.reload('#gv-pasien-id');

	               }
	                else {
	                  alert('error');
	                }
	              }
	            });
	  		});     

	})


 $(document).on('click', '[data-toggle-export-erp-pasien]', function(e){
 	
 	  var array_id = [];
 	  
	  e.preventDefault();
	  var keysSelect1 = $('#gv-pasien-id').yiiGridView('getSelectedRows');

	  array_id.push(keysSelect1);

	  if(keysSelect1 == '')
	  {
	     $('#confirm-permission-alert-pasien-export').modal('show');
	  }else{
	  	$('#confirm-permission-alert-pasien-export-warning').modal('show');
	  };

	 $('#submit-pasien-export').click(function(){
	     $.ajax({
	        beforeSend: function() {
	        	$("#pasien-loading-id").show();
            	location.href = yiiOptionspasien.exporturlpasien+'?idx='+array_id;
            	},
            complete: function(){
     			$("#pasien-loading-id").hide();
  				 },        
	        });
	  	}); 

	});