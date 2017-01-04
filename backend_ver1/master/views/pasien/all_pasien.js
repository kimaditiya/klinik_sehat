
$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#pasien-id-create', function(ehead){        
      $('#modalpasien').modal('show')
      .find('#modalContentpasien').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });


 $(document).on('click', '[data-toggle-delete-erp]', function(e){

	  e.preventDefault();
	  var keysSelect1 = $('#gv-pasien-id').yiiGridView('getSelectedRows');

	  if(keysSelect1 == '')
	  {
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
	        		$("#tes").show();
            		},
	             success: function(result) {
	               if (result == 1){
	                   $.pjax.reload('#gv-pasien-id');

	               }
	                else {
	                  alert('Item already exists ');
	                }
	              }
	            });
	  		});     

	})


 $(document).on('click', '[data-toggle-export-erp]', function(e){
 	

	  e.preventDefault();
	  var keysSelect1 = $('#gv-pasien-id').yiiGridView('getSelectedRows');

	  if(keysSelect1 == '')
	  {
	     $('#confirm-permission-alert-pasien-export').modal('show');
	  }else{
	     $.ajax({
	        beforeSend: function() {
	        	$("#tes").show();
            	location.href = yiiOptionspasien.exporturlpasien+'?idx='+keysSelect1;
            	},
            complete: function(){
     			$("#tes").hide();
  				 },        
	        });
	  	}; 

	});