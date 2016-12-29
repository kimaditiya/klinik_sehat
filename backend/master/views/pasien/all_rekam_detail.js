$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#rekam-detail-id-create', function(ehead){        
      $('#modal-rekam-detail').modal('show')
      .find('#modalContentrekamdetail').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });