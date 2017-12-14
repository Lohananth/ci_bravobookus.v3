<section role="main" class="content-body" style="margin-top: -30px;">
	<header class="page-header">
		<h2><i class="fa fa-home"></i> Advanced <?php echo $form_title;  ?></h2>
		<div class="right-wrapper pull-left">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo site_url(); ?>dashboard.html">								
					</a>
				</li>								
				<div class="btn btn-default" style="margin-right:10px; border-radius: 0px;">
					<a href="<?php  $this->uri->segment(1); ?><?php echo site_url(); ?>add-schedules.html"> 
						<i class="fa fa-plus"></i>
						Add
					</a>
				</div>
				<div class="btn btn-success" style="margin-right:10px;border-radius: 0px;">
					<a href="<?php echo site_url(); ?>list-schedules.html"> 
						<i class="fa fa-list" aria-hidden="true"></i>
						List
					</a>
				</div>
				<div class="btn btn-danger" style="border-radius: 0px;"> <a href="<?php echo site_url(); ?>schedules-blocked.html"> 
						<i class="fa fa-ban"></i>
						Blocked
					</a>
				</div>
			</ol>				
		</div>					
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="index.html">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Tables</span></li>
				<li><span>Advanced</span></li>
			</ol>					
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
			<!-- start: page -->						
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>						
			<h2 class="panel-title"><i class="fa fa-home"></i> <?php echo $form_title;  ?></h2>
		</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
				<thead>
					<tr>
						<th style="width: 50px;">#No</th>
						<th style="width: 50px;">Logo</th>
						<th>Comapny Name</th>
						<th>Vechicle CODE</th>
						<th>Vechicle Name</th>
						<th class="hidden-phone">Driver Name</th>
						<th class="hidden-phone">Tools</th>
					</tr>
				</thead>
				<tbody>
										
					<?php 
					$i=1;
					foreach ($vechicles_list as $vch) {
						?>
						<tr class="gradeA">
						<td><?php echo $i; ?></td>
						<td ><a data-toggle="tooltip" title="View <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>#"><img style="width: 50px;" src="<?php echo base_url(); ?>uploads/vechicle/<?php echo $vch['logo']; ?>" alt="<?php echo $vch['company_name']; ?>"></a></td>
						<td ><?php echo $vch['company_name']; ?></td>
						<td><?php echo $vch['code']; ?></td>
						<td><?php echo $vch['vehicle_name']; ?></td>
						<td class="center hidden-phone" data-toggle="tooltip" title="Phone : <?php echo $vch['phone']; ?>"><?php echo $vch['driver_name']; ?></td>
						<td class="center hidden-phone">
							<a data-toggle="tooltip" title="Edit <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>edit-vehicles.html/<?php echo $vch['v_id']; ?>" class="btn btn-primary" role="button">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							<a <?php echo $vch['v_id']; ?>" data-toggle="tooltip" title="View <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>view-vehicles.html/<?php echo $vch['v_id']; ?>" class="btn btn-success" role="button">
							<i class="fa fa-eye" aria-hidden="true"></i></a>

							<a data-toggle="tooltip" title="Block <?php echo $vch['vehicle_name']; ?>" href="#<?php echo $vch['v_id']; ?>" class="btn btn-warning" role="button">
							<i class="fa fa-ban"></i></a>

						</td>
					</tr>

						<?php
						$i++;
					}

					?>
					
				</tbody>
			</table>
		</div>
	</section>						
			<!-- end: page -->
</section>

<!-- Modal Add Category -->
<div class="modal fade" id="myVechicleAdd" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Add New Vechicle</h4>
    </div>
    <div class="modal-body">
		<form class="form-horizontal " action="<?php echo site_url(); ?>Admin_dashboard/new_hotel/create" method="post">
			<div class="form-group">
				<label class="col-md-3 control-label">Company Name</label>
				<div class="col-md-6">
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
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label">Vechicle Code</label>
				<div class="col-md-6">
				<input type="text" name="vc_code" id="vc_code" class="form-control" value="" required="required">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label">Vechicle Name</label>
				<div class="col-md-6">
				<input type="text" name="vc_name" id="vc_name" class="form-control" value="" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Vechicle Type</label>
				<div class="col-md-6">
					<select data-plugin-selectTwo class="form-control populate" name="vc_type" >
						<optgroup label="Select one Company">
						<?php 
						foreach ($vehicle_type as $vc_type) {
						?>
						<option value='<?php echo $vc_type['id']; ?>'><?php echo $vc_type['vehicle_type']; ?></option>
						<?php
						}
						?>	
						</optgroup>
					</select>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label">Driver Name</label>
				<div class="col-md-6">
					<select data-plugin-selectTwo class="form-control populate" name="driver_name" >
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
			</div>				
			<div class="form-group">
				<label class="col-md-3 control-label">Choose Amennities</label>
				<div class="col-md-6">
					<select multiple data-plugin-selectTwo class="form-control populate" multiple="multiple" name="amenities[]">
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
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label">Status</label>
				<div class="col-md-6">
				     <div class="checkbox">
				      <input type="checkbox" name="gender" id="gender" data-toggle="toggle" data-on="Active" data-off="DisActive" data-onstyle="success" data-offstyle="danger" checked />
				    </div>
				    <input type="hidden" name="hidden_gender" id="hidden_gender" value="0" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Seat Layout</label>
				<div class="col-md-6">
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
			</div>
			<div></div>		

			<input type="submit" name="btnSave" class="btn btn-success" value="Save">						
		</form>
    </div>
    <div class="modal-footer">
</div>      
    </div>
  </div>
</div>


<!-- Modal Views-->
<?php
foreach ($vechicles_list as $vch) {
						?>
<div class="modal fade" id="myVechicleView<?php echo $vch['v_id']; ?>" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Detail Vechicle of <?php echo $vch['company_name']; ?></h4>
			    </div>
			    <div class="modal-body">		
					<table>			
						<thead>
							<tr>
								<th width="35%"> Company Detail</th>
								<th width="35%"> Vechicle Detail</th>
								<th width="30%"> Map</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $vch['company_name']; ?></td>
								<td><?php echo $vch['company_name']; ?></td>
								<td><?php echo $vch['company_name']; ?></td>
							</tr>
						</tbody>
					</table>
			    </div>
			    <div class="modal-footer">
			</div>  


<!-- <button class="tablink" onclick="openCity('London', this, 'red')" id="defaultOpen">Company</button>
<button class="tablink" onclick="openCity('Paris', this, 'green')">Vechicle</button>
<button class="tablink" onclick="openCity('Tokyo', this, 'blue')">Amenities</button>
<button class="tablink" onclick="openCity('Oslo', this, 'orange')">Location</button>
<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="Oslo" class="tabcontent">
  <h3>Oslo</h3>
  <p>Oslo is the capital of Norway.</p>
</div> -->



<!-- <script>
function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script> -->



		</div>
    </div>
</div>





<?php } ?>

</div>
