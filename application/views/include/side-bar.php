<div class="col-sm-12 col-md-4 col-lg-3">
<?php if($mainpage_url !="bus-operator.php"){ ?>

	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-bus"></i> Bus Operator</h3>
		</div>
		<div class="panel-body">
			<?php 
			include_once("daily-booking/class/company.php");
			$company_obj = new Company(); $company_obj->conn();
			$companies = $company_obj->getAll("ORDER BY order_by ASC LIMIT 7");
			?>
			<ul class="fa-ul">
				<?php foreach($companies as $company): ?>	
					<li><a href="/bus-comid-<?php echo $company->id ?>.html"><i class="fa-li fa fa-bus"></i> <?php echo $company->company_name ?></a></li>
				<?php endforeach ?>
			</ul>
			<a href="/bus-operator.html"><i>&#10140; Find more...</i></a>
		</div>
	</div>
<?php } ?>
<?php if($mainpage_url !="accommodation.php"){ ?>
	<div class="well well-sm"><i class="fa fa-hotel"></i> TOP ACCOMMODATION</div>
		<div class="row" style="text-align: center; font-size: 12px">
			<?php
			include_once(LIBRARY.DS.'property'.DS.'tbl-hotel.php');
			include_once(LIBRARY.DS.'property'.DS.'tbl-hotel-feature.php');
			$hotel = Hotel::findAll();
			foreach($hotel as $hotel_tmp):
				$hotel_feature_array = explode(',', $hotel_tmp['hotel_feature_id']);
			?>
			<div class="col-sm-6">
				<a href="hotel-room.html?hotel_id=<?php echo $hotel_tmp['id']; ?>">
					<img src="<?php echo Hotel::hotelImagePath($hotel_tmp['id']); ?>" alt="<?php echo $hotel_tmp['hotel_name']; ?>">
					<div>
						<?php echo $hotel_tmp['hotel_name']; ?>
					</div>
					<hr>
				</a>
			</div>
			<?php
			endforeach;
			?>
		</div>
<?php } ?>
	<div class="well well-sm"><i class="fa fa-plane"></i> ATTRACTION</div>
	<div id="side_bar_ca" class="owl-carousel text-center">
		<?php
		include_once(LIBRARY.DS.'property'.DS.'tbl-tour-package.php');
		$tour_package = TourPackage::findAll();
		foreach($tour_package as $tour_package_tmp):
			?>
		<div class="item">
			<a href="tour-detail.html?tour_package_id=<?php echo $tour_package_tmp['id']; ?>">
				<img src="<?php echo TourPackage::tourPackageImagePath($tour_package_tmp['id']); ?>" alt="<?php echo $tour_package_tmp['title']; ?>">
				<span class="h_ca_ca">
					<span class="title">
						<?php echo $tour_package_tmp['title']; ?>
					</span>
				</span>
			</a>
		</div>
		<?php
		endforeach;
		?>
	</div>
</div>