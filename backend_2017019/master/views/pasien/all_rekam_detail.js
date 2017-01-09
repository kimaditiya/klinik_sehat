$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#rekam-detail-id-create', function(ehead){        
      $('#modal-rekam-detail').modal('show')
      .find('#modalContentrekamdetail').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });

 $.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#rekam-dosis-id-create', function(ehead){        
      $('#modal-rekam-dosis').modal('show')
      .find('#modalContentrekamdosis').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });


    $(document).on('click', '[data-toggle-delete-erp-rekam-detail]', function(e){
	  e.preventDefault();
	  var keysSelect1 = $('#gv-rekam-detail-id').yiiGridView('getSelectedRows');

	  if(keysSelect1 == ''){
	    	$('#confirm-permission-alert-rekam-dosis').modal('show');
	  }else{
	     	$('#confirm-permission-alert-rekam-dosis-delete').modal('show');
		}

	    $('#submit-rekam-detail').click(function(){
	     /* when the submit button in the modal is clicked, submit the form */
	     $.ajax({
	             url: yiiOptionsdetailmedis.deleteurldetailmedis,
	             //cache: true,
	             type: 'POST',
	             data:{keysSelect:keysSelect1},
	             dataType: 'json',
	             success: function(result) {
	               if (result == 1){
	                   $.pjax.reload('#gv-rekam-detail-id');

	               }
	                else {
	                  alert('error');
	                }
	              }
	            });
	  		});     
		})


	$(document).on('click', '[data-toggle-delete-dosis]', function(e){
			e.preventDefault();
			var data_param = $(this).data('toggle-delete-dosis');
			var param = data_param.split(",");
			var param_id = param[0];
			var param_kd = param[1];
			$.ajax({
					url:  yiiOptionsdetailmedis.deletedosis,
					type: 'POST',
					//contentType: 'application/json; charset=utf-8',
					data:'id='+param_id,
					dataType: 'json',
					success: function(result) {
						if (result == 1){
							$.pjax.reload({container:'#gv-rekam-dosis'+param_kd});
						}
					}
				});
		});

	