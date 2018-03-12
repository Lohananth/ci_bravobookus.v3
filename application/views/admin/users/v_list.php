<section role="main" class="content-body" style="margin-top: -30px;">
					<header class="page-header">
						<h2><i class="fa fa-home"></i> Manage <?php echo ucfirst(substr($this->uri->segment(3), 0 ));  ?></h2>

					<div class="right-wrapper pull-left">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo site_url(); ?><?php echo $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3); ?>">								
									</a>
								</li>								
								<div class="btn btn-default" style="margin-right:10px;">
									<a href="<?php echo site_url(); ?><?php echo $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3); ?>/add"> 
										<i class="fa fa-plus"></i>
										Add
									</a>
								</div>
								<div class="btn btn-success" style="margin-right:10px;">
									<a href="<?php echo site_url(); ?><?php echo $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3); ?>/1"> 
										<i class="fa fa-list" aria-hidden="true"></i>
										Active
									</a>
								</div>
								<div class="btn btn-danger"> <a href="<?php echo site_url(); ?><?php echo $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3); ?>/0"> 
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
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ComID</th>
											<th >Name</th>
											<th>Phone</th>
											<th class="hidden-phone">E-Mail</th>
											<th class="hidden-phone">User</th>
											<th class="hidden-phone">Options</th>
										</tr>
									</thead>
									<tbody>


										<?php 
										foreach ($v_companies as $rows) {
											?>
											<tr class="gradeX">
											<td width="10%"><code data-toggle="tooltip" title="Booking Code"><?php echo $rows['id']; ?></code></td>
											<td width="20%"><?php echo $rows['company_name']; ?></td>
											<td width="25%"><p data-toggle="tooltip" title="Company Name">
												<?php echo $rows['phone']; ?></p></td>
											
											<td width="15%" class="center hidden-phone"><?php echo $rows['email']; ?></td>
											<td width="5%"><?php //echo $rows['User_ID']; ?>
												<?php 
												if($rows['status']==1){
													$st="success";
												// }elseif ($rows['status']=="Pending") {
												// 	$st="warning";
												// }elseif ($rows['status']=="Unpaid") {
												// 	# Unpaid
												// 	$st="danger";												
												// }elseif ($rows['status']=="Confirmed") {
												// 	$st="info";
												}else{
													$st="danger";
												}
												?>
												<span class="label label-<?php echo $st; ?>"> 

													<?php echo $status=($rows['status']==1)?'Active':'Blocked'; ?>
												</span>
												</td>
											<td class="center hidden-phone">
													<a data-toggle="tooltip" title="Edit <?php echo $rows['company_name']; ?>" href="#<?php echo $rows['id']; ?>" class="btn btn-primary btn-sm" role="button">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

													<a data-toggle="tooltip" title="Delete <?php echo $rows['company_name']; ?>" href="#<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm" role="button">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a>
													<a data-toggle="tooltip" title="Block <?php echo $rows['company_name']; ?>" href="#<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm" role="button">
													<i class="fa fa-ban"></i></a>

												</td>
										</tr>

											<?php
										}
										?>
										
									</tbody>
								</table>
							</div>
						</section>
						
						
					<!-- end: page -->
				</section>