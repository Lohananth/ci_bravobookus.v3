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

					<h2 class="panel-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Vehicle</h2>
				</div>
			</div>

			<!-- <form action="v_edit_submit" method="get" accept-charset="utf-8"> -->
			<form  action="<?php echo site_url(); ?>admin/vehicles/vehicles/save/create" method="post" accept-charset="utf-8" enctype='multipart/form-data'>
			<div class="panel-body">

				<div class="row">	

					<div class="col-md-2 form-group">
						Company Name <span>(*)</span>
					</div>

					<div class="col-md-5 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="company_id">
							<optgroup label="Select one Company">
								
								<?php 

								foreach ($companies as $company) {
								?>
									<option value='<?php echo $company['id']; ?>'><?php echo $company['company_name']; ?></option>
								<?php
								}
								?>	
							</optgroup>
						</select>
					</div>


					<div class="col-md-2 form-group">
						Vehicle Code <span>(*)</span>
					</div>

					<div class="col-md-3 form-group">
								<input type="text" name="code" placeholder="PP-2A-0004" class="form-control" required="required">
					</div>
					<!-- Vehicle Name -->

					<div class="col-md-2 form-group">
						Vehicle Name <span>(*)</span>
					</div>
					<div class="col-md-5 form-group">
						<input type="text" name="vehicle_name" id="vehicle_name" class="form-control" placeholder="Vehicle Name" value="" required="required">
					</div>

					<!-- Vehicle Type -->
					<div class="col-md-2 form-group">
						Vehicle Type <span>(*)</span>
					</div>
					<div class="col-md-3 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="vehicle_type" required="required">
									<optgroup label="Select one Company">
									<?php 
									foreach ($vehicle_type as $vc_type) {
									?>
									<option value='<?php echo $vc_type['vt_id']; ?>'><?php echo $vc_type['vehicle_type']; ?></option>
									<?php
									}
									?>	
									</optgroup>
						</select>
					</div>
					<!-- Driver Name -->
					<div class="col-md-2 form-group">
						Driver Name <span>(*)</span>
					</div>
					<div class="col-md-3 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="drivers" required="required" >
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
					<!-- Amenities -->
					<div class="col-md-2 form-group">
						Amenities <span>(*)</span>
					</div>
					<div class="col-md-5 form-group">
						<select multiple data-plugin-selectTwo class="form-control populate" multiple="multiple" name="amenities[]" placeholder="Click here to select" required="required">
									<optgroup label="Select Facilities">
										<?php 
										foreach ($amenities as $facil) {
											?>
											<option value='<?php echo $facil['id']; ?>'><?php echo $facil['amenity']; ?></option>
											<?php
										}

										?>	
									</optgroup>
						</select>
					</div>

					<div class="col-md-2 form-group">
						Seat Type <span>(*)</span>
					</div>

					<div class="col-md-5 form-group">
						<select data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Select a State", "allowClear": true }' name="seats"  required="required">
									<optgroup label="Select one Company">
									<?php 
									foreach ($seattypes as $seattype) {
									?>
									<option value='<?php echo $seattype['seat_type_id']; ?>'><?php echo $seattype['seat_type']; ?></option>
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
					<!-- Inspector -->
					<div class="col-md-2 form-group">
						Inspector <span>(*)</span>
					</div>

					<div class="col-md-5 form-group">
						<select data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Select a inspector", "allowClear": true }' name="inspectors" required="required">
									<optgroup label="Select one Inspector">
									<option value='0'>None</option>
									<?php 
									foreach ($tbl_inspector as $rows) {
									?>
									<option value='<?php echo $rows['id']; ?>'><?php echo $rows['inspector_name']; ?></option>
									<?php
									}
									?>	
									</optgroup>
								</select>
					</div>

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








