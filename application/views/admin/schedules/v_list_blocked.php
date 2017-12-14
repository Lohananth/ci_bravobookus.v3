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
						<th>#No</th>
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
						<td><?php echo $vch['company_name']; ?></td>
						<td><?php echo $vch['code']; ?></td>
						<td><?php echo $vch['vehicle_name']; ?></td>
						<td class="center hidden-phone"><?php echo $vch['drivers']; ?></td>
						<td class="center hidden-phone">
							<a title="Edit <?php echo $vch['vehicle_name']; ?>" href="#<?php echo $vch['v_id']; ?>" class="btn btn-primary" role="button">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							<a title="Delete <?php echo $vch['vehicle_name']; ?>" href="#<?php echo $vch['v_id']; ?>" class="btn btn-danger" role="button">
							<i class="fa fa-trash-o" aria-hidden="true"></i></a>
							<a title="Block <?php echo $vch['vehicle_name']; ?>" href="#<?php echo $vch['v_id']; ?>" class="btn btn-warning" role="button">
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
					<select multiple data-plugin-selectTwo class="form-control populate" multiple="multiple" name="facilities[]">
						<optgroup label="Select Facilities">
							<?php 
							foreach ($facilities as $facil) {
								?>
								<option value='<?php echo $facil['facil_icon']; ?>'><?php echo $facil['facil_name']; ?></option>
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


</div>