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

					<h2 class="panel-title"><i class="fa fa-edit" aria-hidden="true"></i> Edit <?php echo $tbl_vehicle[0]['vehicle_name']; ?></h2>
				</div>
			</div>

			<!-- <form action="v_edit_submit" method="get" accept-charset="utf-8"> -->
			<form  action="<?php echo site_url(); ?>admin/vehicles/vehicles/save/do_update/<?php echo $tbl_vehicle[0]['v_id']; ?>" method="post" accept-charset="utf-8">
			<div class="panel-body">

				<div class="row">	

					<div class="col-md-2 form-group">
						Company Name <span>(*)</span>
					</div>

					<div class="col-md-5 form-group">
						
				<select data-plugin-selectTwo name="company_id" id="company_id" class="form-control">
				<?php
					$com_id = $tbl_vehicle[0]['company_id'];
					foreach($companies as $rows){
						if ($rows['company_id']==$com_id){
							print_r($rows['company_name']);
							?>
							<option value="<?php echo $rows['id'];  ?>" selected="selected"><?php echo $rows['company_name'];  ?></option>
							<?php
						} else {
							?>
							<option value="<?php echo $rows['id'];  ?>"><?php echo $rows['company_name'];  ?></option>
							<?php
						}
					}
				?>										
			</select>


					</div>


					<div class="col-md-2 form-group">
						Vehicle Code <span>(*)</span>
					</div>

					<div class="col-md-3 form-group">
						<input type="text" name="code" placeholder="PP-2A-0004" class="form-control" value="<?php echo $tbl_vehicle[0]['code']; ?>">
					</div>
					<!-- Vehicle Name -->

					<div class="col-md-2 form-group">
						Vehicle Name <span>(*)</span>
					</div>
					<div class="col-md-3 form-group">
						<input type="text" name="vehicle_name" id="vehicle_name" class="form-control" placeholder="Vehicle Name" value="<?php echo $tbl_vehicle[0]['vehicle_name']; ?>" required="required">
					</div>

					<!-- Vehicle Type -->
					<div class="col-md-2 form-group">
						Vehicle Type <span>(*)</span>
					</div>
					<div class="col-md-5 form-group">
						
			<select data-plugin-selectTwo name="vehicle_type" id="vehicle_type" class="form-control">
				<?php
					$vh_id = $tbl_vehicle[0]['vehicle_type'];
					foreach($vehicle_type as $rows){
						if ($rows['vt_id']==$vh_id){
							print_r($rows['vehicle_type']);
							?>
							<option value="<?php echo $rows['vt_id'];  ?>" selected="selected"><?php echo $rows['vehicle_type'];  ?></option>
							<?php
						} else {
							?>
							<option value="<?php echo $rows['vt_id'];  ?>"><?php echo $rows['vehicle_type'];  ?></option>
							<?php
						}
					}
				?>										
			</select>




					</div>
					<!-- Driver Name -->
					<div class="col-md-2 form-group">
						Driver Name <span>(*)</span>
					</div>
					<div class="col-md-3 form-group">
					
			<select data-plugin-selectTwo name="driver_name" id="driver_name" class="form-control">
				<?php
					$drivers = $tbl_vehicle[0]['drivers'];
					foreach($driver_names as $rows){
						if ($rows['id']==$drivers){
							print_r($rows['driver_name']);
							?>
							<option value="<?php echo $rows['id'];  ?>" selected="selected"><?php echo $rows['driver_name'];  ?></option>
							<?php
						} else {
							?>
							<option value="<?php echo $rows['id'];  ?>"><?php echo $rows['driver_name'];  ?></option>
							<?php
						}
					}
				?>										
			</select>




					</div>	
					<!-- Amenities -->
					<div class="col-md-2 form-group">
						Amenities <span>(*)</span>
					</div>
					<div class="col-md-5 form-group">
						<select multiple data-plugin-selectTwo class="form-control populate" multiple="multiple" name="amenities[]" placeholder="Click here to select">
									
						<optgroup label="Select Facilities">
							<?php $vh_amenities = explode(",", $tbl_vehicle[0]['amenities']) ?>
							<?php 
							foreach ($amenities as $amenity) {
								?>
								<?php for($i=0; $i<count($vh_amenities); $i++){
									if($amenity['id']==$vh_amenities[$i]){?>
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
						<input  type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="DisActive" data-onstyle="success" data-offstyle="danger" checked />
					</div>
						 <input type="hidden" name="status_hide" id="status_hide" value="1" />
					</div>
					

					<div class="col-md-12 form-group">
						<?php 
						$gallery=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle_photo_gallery where v_id=".$tbl_vehicle[0]['v_id']);
						foreach ($gallery as $rows) {
							//echo $rows['Thumbnail'];
							?>
							<img style="width: 50px;" src="<?php echo base_url(); ?>uploads/vehicles/galleries/<?php echo $rows['Thumbnail']; ?>" alt="<?php echo $rows['Thumbnail']; ?>" >

							<?php
						}

						?>
						
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








