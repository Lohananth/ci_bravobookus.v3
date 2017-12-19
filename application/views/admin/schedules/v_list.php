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
				<div class="btn btn-danger" style="border-radius: 0px;"> <a href="<?php echo site_url(); ?>list-schedules-blocked.html"> 
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
						<th style="width: 5%;">#No</th>
						<th style="width: 10%;">Origin</th>
						<th style="width: 10%;">Destination</th>
						<th style="width: 10%;">Vechicle Name</th>
						<th style="width: 10%;">Departure Time</th>
						<th style="width: 10%;">Duration</th>
						<th style="width: 10%;">Local Price</th>
						<th style="width: 10%;">Foreign Price</th>
						<th style="width: 20%;">Actions</th>
					</tr>
				</thead>
				<tbody>									
					<?php 
					$i=1;
					foreach ($vschedule_list as $vch) {
					?>
						<tr class="gradeA" id="row-id-<?php echo $vch['id']; ?>">
						<td><?php echo $i; ?></td>
						<td ><?php echo $vch['origin']; ?></td>
						<td ><?php echo $vch['destination']; ?></td>
						<td><?php echo $vch['vehicle_name']; ?></td>
						<td><?php echo $vch['departure_time']; ?></td>
						<td><?php echo $vch['travel_duration'];?></td>
						<td><?php echo $vch['local_price'];?></td>
						<td><?php echo $vch['foreigner_price'];?></td>
						<td class="center hidden-phone">
							<a data-toggle="tooltip" title="Edit <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>edit-schedules.html/<?php echo $vch['id']; ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
							<a <?php echo $vch['id']; ?>" data-toggle="tooltip" data-toggle="modal" data-target="#myModalView" dataid="<?php echo $vch['id']; ?>" title="View <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>view-schedules.html/<?php echo $vch['id']; ?>" class="btn btn-success btn-sm btn-view-schedule" role="button">
							<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-toggle="modal" data-target="#myModalBlock" dataid="<?php echo $vch['id']; ?>" title="Block <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>blocked-schedules.html/<?php echo $vch['id']; ?>" class="btn btn-warning btn-sm btn_getBlocked" role="button">
							<i class="fa fa-ban"></i></a>
						</td>
						<input type="hidden" name="vs_id" value="<?php echo $vschedule_list[0]['id']  ?>">	
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
</div>
<!-- Modal Delete Category -->
<div id="myModalBlock" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Blocked Schedule</h2>
      </div>
      <div class="modal-body">
      		<form id="frm-block-schedule">
			</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" id="btn-blocked">Yes</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete Category -->
<div id="myModalView" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">View Schedule</h2>
      </div>
      <div class="modal-body">
      		<form id="frm-view-schedule">
				<div class="row">
					<div class="form-group"><!--Origin-->
						<div class="col-md-6">
							<label for="origin">Origin(From)<span><b>*</b></span></label>
							<select data-plugin-selectTwo name="origin" id="origin" class="form-control" disabled="true">
								<?php
									$vsorigin = $vschedule_list[0]['origin'];
									foreach($origins as $ori){
										if ($ori['origin']==$vsorigin){
											print_r($ori['origin']);
											?>
											<option value="<?php echo $ori['id'];  ?>" selected="selected"><?php echo $ori['origin'];  ?></option>
											<?php
										} else {
											?>
											<option value="<?php echo $ori['id'];  ?>"><?php echo $ori['origin'];  ?></option>
											<?php
										}
									}
								?>										
							</select>
						</div>
						<div class="col-md-6"><!--Destination-->
							<label for="destination">Destination(To)<span><b>*</b></span></label>
							<select data-plugin-selectTwo name="destination" id="destination" class="form-control" disabled="true">
							<?php
								$vsdest = $vschedule_list[0]['destination'];
								foreach($origins as $ori){
									if ($ori['origin']==$vsdest){
										print_r($ori['origin']);
										?>
										<option value="<?php echo $ori['id'];  ?>" selected="selected"><?php echo $ori['origin'];  ?></option>
										<?php
									} else {
										?>
										<option value="<?php echo $ori['id'];  ?>"><?php echo $ori['origin'];  ?></option>
										<?php
									}
								}
							?>
							</select>						
						</div>
					</div>	
					<div class="form-group"><!--Vehicle Name-->
						<div class="col-md-12">
							<label for="Destination">Vehicle Name<span><b>*</b></span></label>
							<select data-plugin-selectTwo name="v_id" id="v_id" class="form-control" disabled="true">
							<?php
								$vsname = $vschedule_list[0]['vehicle_name'];
								foreach($vehicles as $vh){
									if ($vh['vehicle_name']==$vsname){
										?>
										<option value="<?php echo $vh['v_id'];  ?>" selected="selected"><?php echo $vh['vehicle_name'];  ?></option>
										<?php
									} else {
										?>
										<option value="<?php echo $vh['v_id'];  ?>"><?php echo $vh['vehicle_name'];  ?></option>
										<?php
									}
								}
							?>
							</select>						
						</div>
					</div>	
					<div class="form-group"><!--Local Price-->
						<div class="col-md-4">
							<label for="local_price">Local Price<span><b>*</b></span></label>
							<input type="text" name="local_price" id="local_price" class="form-control" value="<?php echo $vschedule_list[0]['local_price'] ?>" disabled="true">			
						</div>
						<div class="col-md-4">
							<label for="foreigner_price">Foreign Price<span><b>*</b></span></label>
							<input type="text" name="foreigner_price" id="foreigner_price" class="form-control" value="<?php echo $vschedule_list[0]['foreigner_price'] ?>" disabled="true">			
						</div>
						<div class="col-md-4">
							<label for="departure_time">Departure Time<span><b>*</b></span></label>
							<select data-plugin-selectTwo name="departure_time" id="departure_time" class="form-control" disabled="true">
							<?php
								$vsdpt = $vschedule_list[0]['departure_time'];
								foreach($dptimes as $dptime){
									if ($dptime['departure_time']==$vsdpt){
										?>
										<option value="<?php echo $dptime['id'];  ?>" selected="selected"><?php echo $dptime['departure_time'];  ?></option>
										<?php
									} else {
										?>
										<option value="<?php echo $dptime['id'];  ?>"><?php echo $dptime['departure_time'];  ?></option>
										<?php
									}
								}
							?>
							</select>						
						</div>
					</div>	
					<div class="form-group"><!--Travel Duration-->
						<div class="col-md-6">
							<label for="travel_duration">Travel Duration<span><b>*</b></span></label>
							<input type="text" name="travel_duration" id="travel_duration" class="form-control" value="<?php echo $vschedule_list[0]['travel_duration'] ?>" disabled="true">				
						</div>
						<div class="col-md-6 checkbox" style="padding-top: 0px; margin-top:15px;">
							<label for="origin">Active/Block&nbsp;</label>
							<?php if($vschedule_list[0]['status']==1){
								?>
								<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" checked disabled="true" />
								<input type="hidden" name="status_hide" id="status_hide" value="1" disabled="true"/>
								<?php
							} else {
								?>
								<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" disabled="true"/>
								<input type="hidden" name="status_hide" id="status_hide" value="0" disabled="true"/>
								<?php
							}
							?>
						</div>
					</div>							
					<div style="padding-bottom: 15px;"></div>
					<div class="col-md-12 form-group">
<!-- 						<button type="submit" name="btnSave" class="btn btn-success pull-right" value="Save"><span class="fa fa-save"></span> Save</button>
						<a class="btn btn-danger pull-right" style="margin-right: 15px;" href="<?php echo site_url(); ?>list-schedules.html"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a> -->
					</div>										
				</div>
			</form>
      </div>
      <div class="modal-footer">
<!--       	<button type="button" class="btn btn-info" id="btn-blocked">Yes</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button> -->
      </div>
    </div>
  </div>
</div>
