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

		<div class="row">
						<div class="col-md-12">
							<div class="tabs">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#Company_detail" data-toggle="tab"><i class="fa fa-star"></i> Company Detail</a>
									</li>
									<li>
										<a href="#map" data-toggle="tab">Map</a>
									</li>
								</ul>
								<div class="tab-content">
									
									<div id="Company_detail" class="tab-pane active">
										<div class="row">
											<div class="col-md-4">
												<section class="panel">
													<div class="form-group">
														<img style="width:100%;" src="<?php echo base_url(); ?>uploads/vechicle/<?php echo $v_companies[0]['logo']; ?>">
															
															<div class="col-sm-9">
																<h4><?php echo $v_companies[0]['company_name']; ?></h4>
																<h4> <span class="label label-success"><i class="fa fa-phone"></i> | <?php echo $v_companies[0]['phone']; ?></span></h4> 
	 															<?php $service_types = explode(",", $v_companies[0]['service_type']) ?>
																			<?php 
																			foreach ($service_type as $s_type) {
																				 for($i=0; $i<count($service_types); $i++){
																					if($s_type['id']==$service_types[$i]){			
																						?>
																						<h4>
																					 	<span class="label label-info"><?php echo $s_type['name']; ?></span>
																					 </h4>

																						<?php
																					}
																				}
																			}

																		?>



																															
																<!-- address -->
																<address><i class="fa fa-location-arrow" aria-hidden="true"></i>
																	<?php echo $v_companies[0]['address']; ?>
																</address>

																<h4>
																	Service Detail :
																<select multiple data-plugin-selectTwo class="form-control populate" multiple="multiple" name="amenities[]" placeholder="Click here to select">
																		<optgroup label="Select Facilities">
																			<?php $bus_amenities = explode(",", $v_companies[0]['service_detail']) ?>
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
																</h4>

															</div>
														</div>
												</section>
											</div>
											<div class="col-md-8">
											<form id="form" action="forms-validation.html" class="form-horizontal">
												<section class="panel">
													<div class="panel-body">
														<div class="form-group">
															<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
															<div class="col-sm-9">
																<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" value="<?php echo $v_companies[0]['company_name']; ?>" required/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
															<div class="col-sm-9">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-envelope"></i>
																	</span>
																	<input type="email" name="email" value="<?php echo $v_companies[0]['email']; ?>" class="form-control" placeholder="eg.: email@email.com" required/>
																</div>
															</div>
															<div class="col-sm-9">

															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label">Website</label>
															<div class="col-sm-9">
																<input type="url" name="site" value="<?php echo $v_companies[0]['website']; ?>" class="form-control" placeholder="eg.: https://bravobookus.com" />
															</div>
														</div>
														<!-- description -->
														<div class="form-group">
															<label class="col-sm-3 control-label">Description <span class="required">*</span></label>
															<div class="col-sm-9">
																<textarea name="description" rows="5" class="form-control" placeholder="Describe your description" required><?php echo $v_companies[0]['description']; ?></textarea>
															</div>
														</div>

														<!-- description -->
														<div class="form-group">
															<label class="col-sm-3 control-label">Notice <span class="required">*</span></label>
															<div class="col-sm-9">
																<textarea name="notice" rows="5" class="form-control" placeholder="Describe your notice" required><?php echo $v_companies[0]['notice']; ?></textarea>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label">Service Type</label>
															<div class="col-sm-9">
																<?php $service_types = explode(",", $v_companies[0]['service_type']) ?>
																			<?php 
																			foreach ($service_type as $s_type) {
																				 for($i=0; $i<count($service_types); $i++){
																					if($s_type['id']==$service_types[$i]){			
																						?>
																						<h4>
																					 	<span class="label label-info"><?php echo $s_type['name']; ?></span>
																					 </h4>

																						<?php
																					}
																				}
																			}

																		?>
															</div>
														</div>



														

													</div>

													
												</section>
												
											</form>
										</div>
										

										</div>
									</div>

									<div id="map" class="tab-pane">
										<p>Directions</p>
										<?php echo $v_companies[0]['map']; ?>
									</div>
								</div>
							</div>
						</div>
						
					</div>

		<!-- End Row  -->
	</div>


</div>
</section>








