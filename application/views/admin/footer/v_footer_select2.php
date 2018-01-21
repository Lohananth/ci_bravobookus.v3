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

	//Ajax Crud Operation
	//Ajax Add to database
	$('body').delegate('#btnSave','click',function(e){
		e.preventDefault();
	  	$.ajax({
	 		url : "<?php echo base_url() ?>Select2_Controller/Save_Vechicle_Schedule",
	 		type: "POST",
	 		data: $('#frm-create').serialize(),
	 		dataType: 'json',
	 		success:function(data){
	 			if(data.status){
	 				console.log(data);
	 				$('#frm-create')[0].reset();
	 				alert('Record Have been Created...');
	 			}
	 		},
	 		error: function(){
	 			alert('Error...');
	 		}
 		});
	});			

	// ---------------Get data for Update---------------------//    
		$('body').delegate('.edit','click',function (e){
			e.preventDefault();
			var id=$(this).attr('dataid');
	    	$.ajax({
	    		url : "<?php echo base_url() ?>Select2_Controller/get_Vechicle_Schedule",
	    		type: "POST",
	    		data: {id:id},
	    		dataType: 'json',
	    		success:function(data){
		    		$('#update-info').html(data);
						$('#myModalUpdate').data('id',id).modal('show');
		    		$('.select2').select2();
		    		$('.status').bootstrapToggle();
	    		},
	    		error: function(){
	    			alert('Error...');
	    		}
	    	});	
		});

	//----------------update data to database
		$('body').delegate('#btn-aupdate','click',function(e){
			e.preventDefault();
			var id= $('#myModalUpdate').data('id');
			var data = $('#frm-update').serialize();
	    	$.ajax({
	    		url : "AjaxSelect2Controller/update_category",
	    		type: "POST",
	    		data: data,
	    		dataType: 'json',
	    		success:function(data){
	    			alert('Category was Updated successfully...');
	    			//Hide myModalDelete
	    			$('#myModalUpdate').modal('hide');
					// load_category();
	    		},
	    		error: function(){
	    			alert('Error...');
	    			$('#myModalUpdate').modal('hide');		    		
	    		}
	    	});	
		});

	//---------------get schedule for Blocked------------------//
		$('#list-vehicle-row').on('click','.btn_getBlocked',function(e){
		 	e.preventDefault();
		 	var id = $(this).attr('dataid');
		 	var datalink = $(this).attr('data_controller_link');
    		$.ajax({
    		url : "<?php echo base_url() ?>"+datalink,
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
		 	var datalink = $(this).attr('data_controller_link');
    		$.ajax({
	    		url : "<?php echo base_url() ?>"+datalink,
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
		$('body').delegate('.status','change',function(){
			// alert('ok ready');
			if($(this).prop('checked')){
				$('#status_hide').val('1');
				$('#status_hide_upd').val('1');
			} else {
				$('#status_hide').val('0');
				$('#status_hide_upd').val('0');
			}
		});

	    // function load_category(){
	    // 	$.ajax({
	    // 		url : "<?php echo base_url() ?>welcome/get_category",
	    // 		type: "GET",
	    // 		data: $('#frm-create').serialize(),
	    // 		dataType: 'json',
	    // 		success:function(data){
					// $('#category-row').html(data);
	    // 		},
	    // 		error: function(){
	    // 			alert('Error...');
	    // 		}
	    // 	});		    	
	    // }
	    // $('body').tooltip({
	    // 	selector:'[data-toggle="tooltip"]'
	    // });

	});
</script>
<?php $this->load->view('admin/test/popup/popAdd') ?>
<?php $this->load->view('admin/test/popup/popUpdate') ?>
