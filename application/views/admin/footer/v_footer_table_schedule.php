<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Specific Page Vendor -->
<script src="assets/vendor/select2/select2.js"></script>
<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>
<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>
<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<!-- Examples -->
<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
<script src="assets/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javaScript">
	$(document).ready(function(){
		//get schedule for Blocked
		$('#list-row').on('click','.btn_getBlocked',function(e){
		 	e.preventDefault();
		 	var id = $(this).attr('dataid');
		 	var control_link=$(this).attr('data_controller_link');
    		$.ajax({
    		
    		url:"<?php echo base_url(); ?>admin/schedules/schedules/get_block_Schedule",
    		type: "POST",
    		data: {id:id},
    		dataType: 'json',
    		success:function(data){
    			// alert('Hello...');
  				$('#frmBlock').html(data);
				$('#myModalBlock').data('id',id).modal('show');
    		},
    		error: function(){
    			alert('Error...');
    		}
    	});	
		});


		//updated Blocked 
		$('#btn-blocked').on('click',function(e){
		 	var id= $('#myModalBlock').data('id');
		 	// var control_link=$(this).attr('data_controller_link');

	    	$.ajax({
	    		url : "<?php echo base_url() ?>admin/schedules/schedules/update_block_Schedule",
	    		type: "POST",
	    		data: $('#frmBlock').serialize(),
	    		dataType: 'json',
	    		success:function(data){
	    			// alert('Vehicle was Blocked successfully...'+ id );
	    			location.reload();
	    			//Hide myModalDelete
	    			$('#myModalBlock').modal('hide');
	    		},
	    		error: function(){
	    			alert('Error...Actived');
	    			$('#myModalBlock').modal('hide');		    		
	    		}
    		});	
		});

		
//======================== Active ============================//
		//get block Schedule for Active
		$('#list-row').on('click','.btn_getActive',function(e){
		 	e.preventDefault();
		 	var id = $(this).attr('dataid');
    		$.ajax({
	    		url : "<?php echo base_url() ?>admin/schedules/schedules/get_active_Schedule",
	    		type: "POST",
	    		data: {id:id},
	    		dataType: 'json',
	    		success:function(data){
	    			$('#frmActive').html(data);
						$('#myModalActive').data('id',id).modal('show');	    			
	    		},
	    		error: function(){
	    			alert('Error... Blocked');
	    		}
    		});	
		});

		//updated Active Schedule
		$('#btn-Active').on('click',function(e){
		 	var id= $('#myModalActive').data('id');
	    	$.ajax({
	    		url : "<?php echo base_url() ?>admin/schedules/schedules/update_active_Schedule",
	    		type: "POST",
	    		data: $('#frmActive').serialize(),
	    		dataType: 'json',
	    		success:function(data){
	    			// alert('Vehicle was Actived successfully...');
	    			// $("#myAlert").alert("close");
	    			
	    			location.reload();
	    			//Hide myModalDelete
	    			$('#myModalActive').modal('hide');
	    		},
	    		error: function(){
	    			alert('Error...');
	    			$('#myModalBlock').modal('hide');		    		
	    		}
    		});	
		});				

		
//====================================================//
		$('#status').change(function(){
		  if($(this).prop('checked')){
		   $('#status_hide').val('1');
		  }else{
		   $('#status_hide').val('0');
		  }
		});					
	});
</script>

