<?php
	include_once '../daily-booking/class/config.php';
	$DBhost = SERVER_NAME1;
	$DBuser = USER_NAME1;
	$DBpass = PASSWORD1;
	$DBname = DB1;
	$con = mysqli_connect(SERVER_NAME1,USER_NAME1,PASSWORD1,DB1);
	try {
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
	} catch(PDOException $ex){
		die($ex->getMessage());
	}
?>
<?php
if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
		$origin = intval($_REQUEST['origin']);
		$destination = intval($_REQUEST['destination']);
		$vid = intval($_REQUEST['vid']);
		$query = "SELECT * FROM tbl_company WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>
		<h2 class="text-center text-uppercase text-info"> <?php echo $company_name ?></h2>
		<hr>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#operator-info" aria-controls="operator-info" role="tab" data-toggle="tab">Operator Info</a></li>
			<li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">Photos</a></li>
			<li role="presentation"><a href="#boarding-point" aria-controls="boarding-point" role="tab" data-toggle="tab">Boarding Point</a></li>
			<li role="presentation"><a href="#drop-off-point" aria-controls="drop-off-point" role="tab" data-toggle="tab">Drop Off Point</a></li>
			<li role="presentation"><a href="#cancellation-policy" aria-controls="cancellation-policy" role="tab" data-toggle="tab">Cancellation Policy</a></li>
			<li role="presentation"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">Notice</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="operator-info">
				
				<div class="row well">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<img src="/daily-booking/images/operator-logo/<?php echo $logo ?>" alt="<?php echo $company_name ?>">
					</div>
					<div class="col-md-8 col-sm-6 col-xs-12">
						
						<div><b>Address:</b> <?php echo strip_tags($address); ?></div>
						<div><b>Phone:</b> <?php echo $phone ?></div>
						<div><b>Email:</b> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></div>
						<div><b>Website:</b> <a href="http://<?php echo $website ?>" target="_blank"><?php echo $website ?></a></div>
					</div>
				</div>
				
				<?php echo $description ?>
				<?php echo $map ?>				
			</div>
			<div role="tabpanel" class="tab-pane" id="photos">
				<?php $gallery = mysqli_query($con, "SELECT * FROM tbl_vehicle_photo_gallery WHERE Vehicle_Id=$vid");?>
				<div class="row">
				<?php foreach($gallery as $grow): ?>
					<div class="col-md-2 col-sm-4 col-xs-6">
						<a data-fancybox="gallery" href="/images/vehicle-gallery/<?php echo $grow['Large_Image'] ?>"><img  src="/images/vehicle-gallery/thumbnail/<?php echo $grow['Thumbnail'] ?>" class="img-thumbnail" alt="<?php echo $grow['Caption'] ?>"/></a>
					</div>
				<?php endforeach ?>
				</div>
				
			</div>
			<div role="tabpanel" class="tab-pane" id="boarding-point">

				<?php $origi= mysqli_query($con, "SELECT * FROM tbl_branch WHERE company_id=$id AND location=$origin");?>
				<?php if (!$origi) { echo 'Could not run query: ' . mysql_error(); exit; } $row = mysqli_fetch_assoc($origi); ?>
				<p>Branch name: <?php echo $row["branch_name"] ?> / Address: <?php echo $row["address"] ?> / Phone: <?php echo $row["phone"] ?> </p>
				<br/>
				<?php echo $row["map"] ?>

			</div>
			<div role="tabpanel" class="tab-pane" id="drop-off-point">
				<?php $desti= mysqli_query($con, "SELECT * FROM tbl_branch WHERE company_id=$id AND location=$destination");?>
				<?php if (!$desti) { echo 'Could not run query: ' . mysql_error(); exit; } $row = mysqli_fetch_assoc($desti); ?>
				<p>Branch name: <?php echo $row["branch_name"] ?> / Address: <?php echo $row["address"] ?> / Phone: <?php echo $row["phone"] ?> </p>
				<br/>
				<?php echo $row["map"] ?>
			</div>
			<div role="tabpanel" class="tab-pane" id="cancellation-policy"><?php echo $cancellation_policy ?></div>
			<div role="tabpanel" class="tab-pane" id="notice"><?php echo $notice ?></div>
		</div>
			
<?php				
	}
	
?>

			