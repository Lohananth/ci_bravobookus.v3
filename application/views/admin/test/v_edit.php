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
						<h2 class="panel-title"><i class="fa fa-edit" aria-hidden="true"></i> Edit <?php echo $data_vehicles[0]['vehicle_name']; ?></h2>
					</div>
				</div>
				<form  action="<?php echo site_url(); ?>admin/schedules/schedules/save/do_update/<?php echo $data_vehicles[0]['id'] ?>" method="post" accept-charset="utf-8">
					<div class="panel-body">
						<div class="row">
							<div class="form-group"><!--Origin-->
								<div class="col-md-6">
									<label for="origin">Origin(From)<span><b>*</b></span></label>
									<select data-plugin-selectTwo name="origin" id="origin" class="form-control">
										<?php
											$vsorigin = $data_vehicles[0]['origin'];
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
									<select data-plugin-selectTwo name="destination" id="destination" class="form-control">
										<?php
										$vsdest = $data_vehicles[0]['destination'];
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
									<label for="vehicle_name">Vehicle Name<span><b>*</b></span></label>
									<select data-plugin-selectTwo name="v_id" id="v_id" class="form-control">
										<?php
										$vsname = $data_vehicles[0]['vehicle_name'];
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
									<input type="text" name="local_price" id="local_price" class="form-control" value="<?php echo $data_vehicles[0]['local_price'] ?>">						
								</div>
								<div class="col-md-4">
									<label for="foreigner_price">Foreign Price<span><b>*</b></span></label>
									<input type="text" name="foreigner_price" id="foreigner_price" class="form-control" value="<?php echo $data_vehicles[0]['foreigner_price'] ?>">					
								</div>
								<div class="col-md-4">
									<label for="departure_time">Departure Time<span><b>*</b></span></label>
									<select data-plugin-selectTwo name="departure_time" id="departure_time" class="form-control">
										<?php
										$vsdpt = $data_vehicles[0]['departure_time'];
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
									<input type="text" name="travel_duration" id="travel_duration" class="form-control" value="<?php echo $data_vehicles[0]['travel_duration'] ?>">					
								</div>
								<div class="col-md-6 checkbox" style="padding-top: 0px; margin-top:15px;">
									<label for="origin">Active/Block&nbsp;</label>
									<?php if($data_vehicles[0]['status']==1){
										?>
										<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" checked />
										<input type="hidden" name="status_hide" id="status_hide" value="1" />
										<?php
									} else {
										?>
										<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" />
										<input type="hidden" name="status_hide" id="status_hide" value="0" />
										<?php
									}
									?>
								</div>
							</div>							
							<div style="padding-bottom: 15px;"></div>
							<div class="col-md-12 form-group">
								<button type="submit" name="btnSave" class="btn btn-success pull-right" value="Save"><span class="fa fa-save"></span> Save</button>
								<a class="btn btn-danger pull-right" style="margin-right: 15px;" href="<?php echo site_url(); ?>list-schedules.html"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
							</div>										
						</div>
					</div>
				</form>
			</div>
			<!-- end: page -->
		</div> 
		<!-- End Row  -->
	</div>
</div>
</section>








