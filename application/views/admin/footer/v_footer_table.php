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
		$('#list-vehicle-row').on('click','.btn_getBlocked',function(e){
		 	e.preventDefault();
		 	var id = $(this).attr('dataid');
    		$.ajax({
    		url : "<?php echo base_url() ?>get_block_Schedule.html",
    		type: "POST",
    		data: {vs_id:id},
    		dataType: 'json',
    		success:function(data){
  				$('#frm-block-schedule').html(data);
				$('#myModalBlock').data('id',id).modal('show');
    		},
    		error: function(){
    			alert('Error...');
    		}
    	});	
		});

		//updated Blocked Schedule
		$('#btn-blocked').on('click',function(e){
		 	var id= $('#myModalBlock').data('id');
	    	$.ajax({
	    		url : "<?php echo base_url() ?>disactive_block_Schedule.html",
	    		type: "POST",
	    		data: $('#frm-block-schedule').serialize(),
	    		dataType: 'json',
	    		success:function(data){
	    			alert('Schedule was Blocked successfully...');
	    			location.reload();
	    			//Hide myModalDelete
	    			$('#myModalBlock').modal('hide');
	    		},
	    		error: function(){
	    			alert('Error...');
	    			$('#myModalBlock').modal('hide');		    		
	    		}
    		});	
		});

		//view the schecule by id
		$('#list-vehicle-row').on('click','.btn-view-schedule',function(e){
			e.preventDefault();
		 	var id = $(this).attr('dataid');
    		$.ajax({
	    		url : "<?php echo base_url() ?>viewForm-schedules.html",
	    		type: "POST",
	    		data: {vs_id:id},
	    		dataType: 'json',
	    		success:function(data){
	    			$('#frm-view-schedule').html(data);
						$('#myModalView').data('id',id).modal('show');	    			
	    		},
	    		error: function(){
	    			alert('Error...');
	    		}
    		});	
		});
//====================================================//
		//get block Schedule for Active
		$('#list-block-schedule').on('click','.btn_getActive',function(e){
		 	e.preventDefault();
		 	var id = $(this).attr('dataid');
    		$.ajax({
	    		url : "<?php echo base_url() ?>get-schedules-for-active.html",
	    		type: "POST",
	    		data: {vs_id:id},
	    		dataType: 'json',
	    		success:function(data){
	    			$('#frm-active-schedule').html(data);
						$('#myModalActive').data('id',id).modal('show');	    			
	    		},
	    		error: function(){
	    			alert('Error...');
	    		}
    		});	
		});

		//updated Active Schedule
		$('#btn-Active').on('click',function(e){
		 	var id= $('#myModalActive').data('id');
	    	$.ajax({
	    		url : "<?php echo base_url() ?>active-schedules.html",
	    		type: "POST",
	    		data: $('#frm-active-schedule').serialize(),
	    		dataType: 'json',
	    		success:function(data){
	    			alert('Schedule was Actived successfully...');
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

		//view block schedule by id
		$('#list-block-schedule').on('click','.btn-block-view',function(e){
			e.preventDefault();
		 	var id = $(this).attr('dataid');
		 		$.ajax({
	    		url : "<?php echo base_url() ?>viewBlock-schedules.html",
	    		type: "POST",
	    		data: {vs_id:id},
	    		dataType: 'json',
	    		success:function(data){
	    			$('#frm-view-block').html(data);
						$('#myBlockView').data('id',id).modal('show');	    			
	    		},
	    		error: function(){
	    			alert('Error...');
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

