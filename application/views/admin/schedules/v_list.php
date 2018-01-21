<section role="main" class="content-body" style="margin-top: -30px;">
	<header class="page-header">
		<h2><i class="fa fa-home"></i> Advanced <?php echo $form_title;  ?></h2>
		<div class="right-wrapper pull-left">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo site_url(); ?>admin/dashboard.html">		
					</a>
				</li>								
				<div class="btn btn-default" style="margin-right:10px; border-radius: 0px;">
					<a href="<?php  $this->uri->segment(1); ?><?php echo site_url(); ?>admin/add-schedules.html"> 
						<i class="fa fa-plus"></i>
						Add
					</a>
				</div>
				<div class="btn btn-success" style="margin-right:10px;border-radius: 0px;">
					<a href="<?php echo site_url(); ?>admin/list-schedules.html"> 
						<i class="fa fa-list" aria-hidden="true"></i>
						List
					</a>
				</div>
				<div class="btn btn-danger" style="border-radius: 0px;"> <a href="<?php echo site_url(); ?>admin/list-schedules-blocked.html"> 
						<i class="fa fa-ban"></i>
						Blocked
					</a>
				</div>
				<div class="btn btn-info" style="border-radius: 0px;"> 
					<a href="<?php echo site_url(); ?>admin/Schedules/Schedules/pdf_report"> 
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
				<tbody id="list-vehicle-row">									
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
							<a data-toggle="tooltip" data-toggle="modal" data-target="#myModalView" dataid="<?php echo $vch['id']; ?>" title="View <?php echo $vch['vehicle_name']; ?>" href="#" class="btn btn-success btn-sm btn-view-schedule" role="button">
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

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
