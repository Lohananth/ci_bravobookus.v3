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

					<h2 class="panel-title"><i class="fa fa-eye" aria-hidden="true"></i> View <?php echo $tbl_vehicle[0]['vehicle_name']; ?></h2>
				</div>
			</div>

			<!-- <form action="v_edit_submit" method="get" accept-charset="utf-8"> -->
			<form  action="<?php echo site_url(); ?>Admin_dashboard/new_hotel/create" method="post" accept-charset="utf-8">
			<div class="panel-body">

				<div class="row">	

					<div class="col-md-2 form-group">
						Company Name <span>(*)</span>
					</div>

					<div class="col-md-5 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="company_id">
							<optgroup label="Select one Company">
								
								<?php 
								$comp=$tbl_vehicle[0]['company_name'];

								foreach ($companies as $company) {
									if($comp==$company['company_name']){
										echo $company['company_name'];
										?>
										<option selected="selected" value='<?php echo $company['id']; ?>'><?php echo $company['company_name']; ?></option>
										<?php
									}else{
										?>
									<option value='<?php echo $company['id']; ?>'>
									<?php echo $company['company_name']; ?></option>
								<?php
									}								
								}
								?>	
							</optgroup>
						</select>
					</div>


					<div class="col-md-2 form-group">
						Vehicle Code <span>(*)</span>
					</div>

					<div class="col-md-3 form-group">
								<input type="text" placeholder="PP-2A-0004" class="form-control" value="<?php echo $tbl_vehicle[0]['code']; ?>">

					</div>
					<!-- Vehicle Type -->
					<div class="col-md-2 form-group">
						Vehicle Type <span>(*)</span>
					</div>
					<div class="col-md-5 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="vc_type" >
									<optgroup label="Select one Company">
									<?php 
									$vType=$tbl_vehicle[0]['vehicle_type'];
									foreach ($vehicle_type as $vc_type) {
										if($vType==$vc_type['vt_id']){
											?>
											<option selected="selected" value='<?php echo $vc_type['vt_id']; ?>'><?php echo $vc_type['vehicle_type']; ?></option>
											<?php
										}else{
											?>
									<option value='<?php echo $vc_type['vt_id']; ?>'><?php echo $vc_type['vehicle_type']; ?></option>
									<?php
										}									
									}
									?>	
									</optgroup>
								</select>
					</div>

					<!-- Vehicle Name -->

					<div class="col-md-2 form-group">
						Vehicle Name <span>(*)</span>
					</div>
					<div class="col-md-3 form-group">
						<input type="text" name="vc_name" id="vc_name" class="form-control" placeholder="Vehicle Name" value="<?php echo $tbl_vehicle[0]['vehicle_name']; ?>" required="required">
					</div>

					
					<!-- Driver Name -->
					<div class="col-md-2 form-group">
						Driver Name <span>(*)<?php echo $tbl_vehicle[0]['drivers'];?></span>
					</div>
					<div class="col-md-3 form-group">
						<select data-plugin-selectTwo class="form-control populate" name="driver_name" >
									<optgroup label="Select one Company">
									<?php 
									$driver=$tbl_vehicle[0]['drivers'];
									echo $driver;
									foreach ($driver_names as $driver_name) {
										if($driver==$driver_name['id']){
											echo $driver_name['driver_name'];
											?>
										<option selected="selected" value='<?php echo $driver_name['id']; ?>'><?php echo $driver_name['driver_name']; ?></option>
									<?php

										}else{
											?>
									<option value='<?php echo $driver_name['id']; ?>'><?php echo $driver_name['driver_name']; ?></option>
									<?php
										}
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
						<select multiple data-plugin-selectTwo class="form-control populate" multiple="multiple" name="amenities[]" placeholder="Click here to select">
									<optgroup label="Select Facilities">
										<?php $bus_amenities = explode(",", $tbl_vehicle[0]['amenities']) ?>
										<?php 
										foreach ($amenities as $amenity) {
											?>
											<?php for($i=0; $i<count($bus_amenities); $i++){
												if($amenity['id']==$bus_amenities[$i]){?>
													<option selected="selected" value='<?php echo $amenity['id']; ?>'><?php echo $amenity['amenity']; ?></option>
												<?php }
												else{
													?>
													<option  value='<?php echo $amenity['id']; ?>'>
														<?php 
													echo $amenity['amenity']; ?></option>
													<?php
												} 
											}
										}

										?>	
				
									</optgroup>
						</select>
					</div>

					<div class="col-md-2 form-group">
						Seat Type <span>(*)</span>
					</div>

					<div class="col-md-5 form-group">
						<select data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Select a State", "allowClear": true }' name="seat_type" >
									<optgroup label="Select one Company">
									<?php 
									foreach ($seattypes as $seattype) {
									?>
									<option value='<?php echo $seattype['id']; ?>'><?php echo $seattype['seat_type']; ?></option>
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
						<input  type="checkbox" name="gender" id="gender" data-toggle="toggle" data-on="Active" data-off="DisActive" data-onstyle="success" data-offstyle="danger" checked />
									    </div>
									    <input type="hidden" name="hidden_gender" id="hidden_gender" value="0" />
					</div>
					<div class="col-md-2 form-group">
						Feature Image
					</div>
					<div class="col-md-5 form-group">					
												
						<!-- <div class="col-md-6"> -->
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" />
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							<!-- </div> -->
							</div>										
					</div>
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








