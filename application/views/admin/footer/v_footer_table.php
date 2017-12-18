

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

		<script type="text/javaScript">
			$(document).ready(function(){
				//get blocked schedule for update
				$('.btn_blocked').on('click',function(e){
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
			    			alert('Blocked Schedule was Updated successfully...');
			    			//Hide myModalDelete
			    			$('#myModalBlock').modal('hide');
			    		},
			    		error: function(){
			    			alert('Error...');
			    			$('#myModalBlock').modal('hide');		    		
			    	}
		    	});	
				});

				$('#status').change(function(){
				  if($(this).prop('checked')){
				   $('#status_hide').val('1');
				  }else{
				   $('#status_hide').val('0');
				  }
				});					
			});
		</script>

