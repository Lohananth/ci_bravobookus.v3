<section role="main" class="content-body">
	<header class="page-header">
		<h2>Advanced Forms</h2>					
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="index.html">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Forms</span></li>
				<li><span>Advanced</span></li>
			</ol>					
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
	<!-- start: page -->
	
	<div class="row">
	<div class="col-md-12">

		<div data-collapsed="0" class="panel">

			<div class="panel-heading">
				<div class="panel-title">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo ucfirst ($this->uri->segment(3)." ".$this->uri->segment(2)); ?></h2>
				</div>
			</div>

			<!-- <form action="v_edit_submit" method="get" accept-charset="utf-8"> -->
			<form  action="<?php echo site_url(); ?>admin/vehicles/vehicles/save/create" method="post" accept-charset="utf-8" enctype='multipart/form-data'>
			<div class="panel-body">

				<div class="row">	

				


					<div class="col-md-2 form-group">
						Company Name <span>(*)</span>
					</div>

					<div class="col-md-4 form-group">
								<input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control" required="required">
					</div>
					
					<div class="col-md-2 form-group">
						Phone <span>(*)</span>
					</div>
					<div class="col-md-4 form-group">
						<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="" required="required">
					</div>

					<!-- email -->
					<div class="col-md-2 form-group">
						Email <span>(*)</span>
					</div>
					<div class="col-md-4 form-group">
						<input type="email" name="email" id="email" class="form-control" placeholder="yourname@domain.com" value="" required="required">
					</div>
					<!-- address -->
					<div class="col-md-2 form-group">
						Address <span>(*)</span>
					</div>
					<div class="col-md-4 form-group">
						<input type="text" name="address" id="address" class="form-control" placeholder="Address" value="" required="required">
					</div>

					<div class="col-md-2 form-group">
						Page Name <span>(*)</span>
					</div>
					<div class="col-md-4 form-group">
						<input type="text" name="page_name" id="page_name" class="form-control" placeholder="Page Name" value="" required="required">
					</div>
					<!-- website -->

					<div class="col-md-2 form-group">
						Website  <span>(*)</span>
					</div>
					<div class="col-md-4 form-group">
						<input type="text" name="website" id="website" class="form-control" placeholder="www.yourdomain.com" value="" required="required">
					</div>

					<!-- description -->
					<div class="col-md-2 form-group">
						Description  <span>(*)</span>
					</div>
					<div class="col-md-10 form-group">
						<input type="text" name="description" id="description" class="form-control" placeholder="Description" value="" required="required">
					</div>
					<!-- notice -->
					<div class="col-md-2 form-group">
						Notice  <span>(*)</span>
					</div>
					<div class="col-md-10 form-group">
						<input type="text" name="notice" id="notice" class="form-control" placeholder="Notice Here" value="" required="required">
					</div>
					<!-- cancellation_policy -->
					<div class="col-md-2 form-group">
						Cancellation Policy  <span>(*)</span>
					</div>
					<div class="col-md-10 form-group">
						<input type="text" name="cancellation_policy" id="cancellation_policy" class="form-control" placeholder="Cancellation policy" value="" required="required">
					</div>
					<!-- map -->
					<div class="col-md-2 form-group">
						Map  <span>(*)</span>
					</div>
					<div class="col-md-10 form-group">
						<input type="text" name="map" id="map" class="form-control" placeholder="Map Code" value="" required="required">
					</div>
					<!-- service_detail -->
					<div class="col-md-2 form-group">
						Service Detail  <span>(*)</span>
					</div>
					<div class="col-md-10 form-group">
						<input type="text" name="service_detail" id="service_detail" class="form-control" placeholder="Service Detail" value="" required="required">
					</div>





					<!-- Driver Name -->
					<div class="col-md-2 form-group">
						Service Type <span>(*)</span>
					</div>
					<div class="col-md-4 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="service_type" required="required" >
									<optgroup label="Select one Company">
									<?php 
									foreach ($driver_names as $driver_name) {
									?>
									<option value='<?php echo $driver_name['id']; ?>'><?php echo $driver_name['driver_name']; ?></option>
									<?php
									}
									?>	
									</optgroup>
								</select>
					</div>	
				
					<!-- Status -->
					<div class="col-md-2 form-group">
						Status :
					</div>

					<div class="col-md-3 form-group" style="padding-top: 0px; margin-top:-10px;">
						<input  type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="DisActive" data-onstyle="success" data-offstyle="danger" checked />
					</div>
						 <input type="hidden" name="status_hide" id="status_hide" value="1" />
					
					<!-- Image Gallery -->
					<div class="col-md-2 form-group">
						Galleries Image
					</div>
					<div class="col-md-2 form-group">
						<input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple>
					</div>

						<div style="padding-bottom: 15px;"></div>
					<div class="col-md-12 form-group">
						<button type="submit" name="btnSave" class="btn btn-success pull-right" value="Save"><span class="fa fa-save"></span> Save</button> 

						<a class="btn btn-danger pull-right" style="margin-right: 15px;" href="<?php echo site_url(); ?>admin/vehicles.html/list/active"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
					</div>	
												
					</form>
				</div>
			</div>

			<!-- end: page -->
		</div> 
		<!-- End Row  -->
	</div>


</div>
</section>








