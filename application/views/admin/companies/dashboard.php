
				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?php echo ucfirst($this->uri->segment(2)); ?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo site_url(); ?>admin">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard <?php echo ucfirst($this->uri->segment(2)); ?></span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


<div class="row">
						
						
																
														
								<div class="col-md-3 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<a  href="<?php echo site_url(); ?>admin/vehicles.html/add">
										<div class="panel-body">
											<div class="widget-summary widget-summary-sm">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-plus"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Add</h4>
														<div class="info">
															<strong class="amount"><?php echo ucfirst($this->uri->segment(2)); ?> </strong>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</a>
									</section>
								</div>

								<div class="col-md-3 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-primary">
										<a  href="<?php echo site_url(); ?>admin/vehicles.html/list/active">
										<div class="panel-body">
											<div class="widget-summary widget-summary-sm">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-building"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">List active</h4>
														<div class="info">
															<strong class="amount"><?php echo ucfirst($this->uri->segment(2)); ?></strong>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</a>
									</section>
								</div>

								<div class="col-md-3 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-secondary">
										<a  href="<?php echo site_url(); ?>admin/vehicles.html/list/blocked">
										<div class="panel-body">
											<div class="widget-summary widget-summary-sm">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-building"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">List blocked</h4>
														<div class="info">
															<strong class="amount"><?php echo ucfirst($this->uri->segment(2)); ?> </strong>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</a>
									</section>
								</div>
								<div class="col-md-3 col-lg-3 col-xl-3">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<a  href="<?php echo site_url(); ?>booking.html/booking/Paid">
										<div class="panel-body">
											<div class="widget-summary widget-summary-sm">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-calendar"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Reports</h4>
														<div class="info">
															<strong class="amount"><?php echo ucfirst($this->uri->segment(2)); ?> </strong>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</a>
									</section>
								</div>
								

	

							</div>
						</div>
					</div>

</section>	