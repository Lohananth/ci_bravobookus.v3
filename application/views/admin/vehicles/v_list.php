<section role="main" class="content-body" style="margin-top: -30px;">
	<header class="page-header">
		<h2><i class="fa fa-home"></i> List <?php echo $form_title;  ?></h2>
		<div class="right-wrapper pull-left">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo site_url(); ?>dashboard.html">								
					</a>
				</li>								
				<div class="btn btn-default" style="margin-right:10px; border-radius: 0px;">
					<a href="<?php  $this->uri->segment(1); ?><?php echo site_url(); ?>admin/vehicles.html/add"> 
						<i class="fa fa-plus"></i>
						Add
					</a>
				</div>
				<div class="btn btn-success" style="margin-right:10px;border-radius: 0px;">
					<a href="<?php echo site_url(); ?>admin/vehicles.html/list/active"> 
						<i class="fa fa-list" aria-hidden="true"></i>
						List
					</a>
				</div>
				<div class="btn btn-danger" style="border-radius: 0px;"> <a href="<?php echo site_url(); ?>admin/vehicles.html/list/blocked"> 
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
		<!-- <header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>						
			<h2 class="panel-title"><i class="fa fa-home"></i> <?php //echo $form_title;  ?></h2>
		</header> -->
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
				<tbody id="list-vehicle-row">
										
					<?php 
					$i=1;
					foreach ($vechicles_list as $vch) {
						?>
						<tr class="gradeA">
						<td> 
							<a data-toggle="tooltip" title="View Company" href="<?php echo site_url(); ?>admin/vehicles.html/list/active" data-toggle="modal" data-target="#myVechicleView<?php echo $vch['v_id'];?>" >
								<i class="fa fa-eye" aria-hidden="true"></i>   <?php echo $i; ?> </a> 
						</td>
						<td >
							<a  data-toggle="tooltip" title="View <?php echo $vch['vehicle_name']; ?>"  href="<?php echo site_url(); ?>admin/vehicles.html/list/active">
							<img style="width: 50px;" src="<?php echo base_url(); ?>uploads/vechicle/<?php echo $vch['logo']; ?>" alt="<?php echo $vch['company_name']; ?>" ></a>

						</td>
						<td ><?php echo $vch['company_name']; ?></td>
						<td><?php echo $vch['code']; ?></td>
						<td><?php echo $vch['vehicle_name']; ?></td>
						<td class="center hidden-phone" data-toggle="tooltip" title="Phone : <?php echo $vch['phone']; ?>"><?php echo $vch['driver_name']; ?></td>
						<td class="center hidden-phone">
							<a data-toggle="tooltip" title="Edit <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>admin/vehicles.html/edit/<?php echo $vch['v_id']; ?>" class="btn btn-primary btn-sm" role="button">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a <?php echo $vch['v_id']; ?>" data-toggle="tooltip" title="View <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>admin/vehicles.html/view/<?php echo $vch['v_id']; ?>" class="btn btn-success btn-sm" role="button">
							<i class="fa fa-eye" aria-hidden="true"></i></a>

							<?php 
							if($status==1){
								?>
								

							<a data-toggle="tooltip" data-toggle="modal" data-target="#myModalBlock" dataid="<?php echo $vch['v_id']; ?>" data_controller_link="admin/vehicles.html/get_block_Vehicle" title="Block <?php echo $vch['vehicle_name']; ?>" href="#<?php echo $vch['v_id']; ?>" class="btn btn-danger btn-sm btn_getBlocked" role="button">
							<i class="fa fa-ban"></i>
						</a>


								<?php
							}else{
								?>
								
							<a data-toggle="tooltip" data-toggle="modal" data-target="#myModalActive" dataid="<?php echo $vch['v_id']; ?>" title="Active <?php echo $vch['vehicle_name']; ?>" href="<?php echo site_url(); ?>#<?php echo $vch['v_id']; ?>" class="btn btn-success btn-sm btn_getActive" role="button">
							<i class="fa fa-check"></i></a>

								<?php
							}
							?>
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

<!-- Modal Views-->


<!-- Modal Block Category -->
<div id="myModalBlock" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Blocked Vehicle</h2>
      </div>
      <div class="modal-body">
      		<form id="frmBlock">
			</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" id="btn-blocked">Yes</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Active -->
<div id="myModalActive" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Active Schedule</h2>
      </div>
      <div class="modal-body">
      		<form id="frm-active">
			</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" id="btn-Active">Yes</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
<!-- End Active -->

<!-- Modal Delete Category -->
<div id="myModalView" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">View Vehicle</h2>
      </div>
      <div class="modal-body">
      	<form id="frm-view">

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>