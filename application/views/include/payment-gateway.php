<?php ob_start(); ?>
<?php SESSION_START(); ?> 
<?php if(!isset($_SESSION['booking_code'])) header("Location: http://www.vcu.asia"); ?>
	<?php
	include_once("daily-booking/class/config.php");
	include_once("daily-booking/class/class-database.php");
	include_once("daily-booking/class/class-control.php");
	include_once("daily-booking/class/ticket.php");
	?>
	<?php
	$db = new Database1();
	$res = $db->con->query("
		SELECT
		t.*, o.origin AS origin,
		d.origin AS destination,
		vt.vehicle_type
		FROM
		tbl_ticket AS t
		INNER JOIN tbl_vehicle_schedule AS vs ON t.vs_id = vs.id
		INNER JOIN tbl_origin AS o ON vs.origin = o.id
		INNER JOIN tbl_origin AS d ON vs.destination = d.id
		INNER JOIN tbl_vehicle AS v ON vs.v_id = v.id
		INNER JOIN tbl_vehicle_type AS vt ON v.vehicle_type = vt.id
		WHERE
		t.booking_code = {$_SESSION['booking_code']}
		");
	while($detail = $res->fetch_array()){
		$passenger_name = $detail['passenger_name'];
		$invoice_no = $detail['booking_code'];
		$seats[] = $detail['seat_number'];
		$departure_date = $detail['departure_date'];
		$origin_id = $detail['origin'];
		$destination = $detail['destination'];
		$email = $detail['email'];
		$phone = $detail['phone'];
		$bus_type = $detail['vehicle_type'];
		$price = $detail['price'];
		$amount = ($price * count($seats));
		$booking_date = $detail['booking_date'];
	}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Payment</title>
		<?php include_once 'include/meta-link.php'; ?>
		<style>
			#sometext {
				display:none;
				position:fixed;
				width: 100%;
				height: 100%;
				background:rgba(0, 0, 0, 0.9);
				top:0;
				left:0;
				overflow:auto;
				z-index:9999999;
			}
			#sometext .content {
				max-width:480px;
				height:auto;
				margin:30px auto;
				padding:20px;
				background:#FFF;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;
				-webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
				box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
			}
			#sometext .content label {
				cursor:pointer;
			}
			button#delCookie {
				float:right;
			}
		</style>
	</head>
	<body>
		<div id="sometext">
			<div class="content">
				<center><h2 class="text-danger">Warning!</h2></center>
				<br>
				<center class="text-warning">
					<strong>
						<h4>Do not close your broswer at after payment completed. <br>
							Please wait until your can see your ticket.</h4></strong>
						</center>
						<br>
						<from>
							<input type="checkbox" name="checkbox_check"  id="checkbox_check" class="checkbox_check" value="checkbox_check"><label for="checkbox_check"> Do not show this later</label>
							<button type="submit" id="delCookie" class="btn btn-warning">Close</button>
						</from>
					</div>
				</div>
				<div class="banner__">
					<br/>
					<div class="container">
						<div class="header">
							<?php include_once 'include/top-menu.php'; ?>
						</div>
						<div class="banner-text wow fadeInUp" data-wow-delay="0.5s">
							<h1>Plan and <span>Book</span> Your Perfect Trip</h1>
						</div>
					</div>
					<br/>
					<div class="container">
						<?php include_once 'include/booking-form.php'; ?>
					</div>
					<?php include_once 'include/mobile-booking.php'; ?>
				</div>
				<div class="container" id="<?php echo $rand ?>">
					<ol class="breadcrumb">
						<li>You are here: </li>
						<li><a href="/">Home</a></li>
						<li class="active">Payment</li>
					</ol>
					<div class="article">
						<div class="row">
							<div class="col-sm-6 col-md-8">
								<div class="panel panel-danger">
									<div class="panel-heading">
										<h3 class="panel-title">Payment Methods</h3>
									</div>
									<div class="panel-body">
										<div class="well well-sm text-center">
											<h2 class="text-danger">Warning!</h2>
											<h3>Do not close your broswer at after payment completed.<br/> 
												Please wait until your can see your ticket.</h3>
											</div>
											<p class="text-danger bg-warning">Local Payment (Cambodia)</p>
											<div>
												<div class="row">
													<div class="col-xs-3 col-md-2">
														<?php include_once 'include/ipg/sml.php'; ?>
													</div>
													<div class="col-xs-3 col-md-2">
														<?php include_once("include/functions.php") ?>
														<form action="include/wing/send-data.php" method="post">
															<input type="hidden" name="item" value="<?php echo Encrypt('mykey', $invoice_no); ?>">
															<input type="hidden" name="amount" value="<?php echo Encrypt('mykey', $amount); ?>">
															<button type="submit" name="a" id="a"><img src="images/payment-logo/wing.png" width="100" alt=""></button>
														</form>
													</div>
												</div>
											</div>
											<p class="text-danger bg-warning">International Payment Methods</p>
											<div>
												<?php include_once 'include/payment-handle/vpc_master_card.php'; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="well well-sm text-center">
										<strong class="panel-title">Booking Infomaiton</strong>
									</div>
									<table class="table">
										<tbody>
											<tr>
												<td>Generated Date:</td>
												<td><?php echo $booking_date ?></td>
											</tr>
											<tr>
												<td>Invoice No.:</td>
												<td>#<?php echo str_pad($invoice_no, 6, '0', STR_PAD_LEFT); ?></td>
											</tr>
											<tr>
												<td>Passenger Name:</td>
												<td><?php echo $passenger_name ?>  <?php  ?></td>
											</tr>
											<tr>
												<td>Seats Number:</td>
												<td><?php for($i=0; $i<count($seats); $i++): echo $seats[$i].", "; endfor; ?></td>
											</tr>
											<tr>
												<td>Email:</td>
												<td><?php echo $email ?></td>
											</tr>
											<tr>
												<td>Phone Number:</td>
												<td><?php echo $phone ?></td>
											</tr>
											<tr>
												<td>Bus Type</td>
												<td><?php echo $bus_type ?></td>
											</tr>
											<tr>
												<td>Destination</td>
												<td><?php echo $origin_id ?> &#10140; <?php echo $destination ?></td>
											</tr>
											<tr>
												<td>Amount pay ($):</td>
												<td>$ <?php echo $amount ?></td>
											</tr>
											<tr>
												<td>Tax ($):</td>
												<td>$ 0</td>
											</tr>
											<tr>
												<td>Total pay ($):</td>
												<td><span class="text-danger"><strong>$ <?php echo $amount ?></strong></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php include_once 'include/footer.php'; ?>
					<?php include_once 'include/script.php'; ?>
					<script>
						$(document).ready(function () {
							$("#delCookie").click(function(){
								if ($('input.checkbox_check').is(':checked')) {
									$("#sometext").fadeOut("fast");  
								} else 
								{
									del_cookie("cookie");
									$("#sometext").fadeOut("fast");
								}
							});
							console.log(document.cookie);
							var visit = getCookie("cookie");
							if (visit == null) {
								$("#sometext").fadeIn();
								var expire = new Date();
								expire = new Date(expire.getTime() + 7776000000);
								document.cookie = "cookie=here; expires=" + expire;
							}
						});
						function del_cookie(name)
						{
							document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
						}
						function getCookie(c_name) {
							var c_value = document.cookie;
							var c_start = c_value.indexOf(" " + c_name + "=");
							if (c_start == -1) {
								c_start = c_value.indexOf(c_name + "=");
							}
							if (c_start == -1) {
								c_value = null;
							} else {
								c_start = c_value.indexOf("=", c_start) + 1;
								var c_end = c_value.indexOf(";", c_start);
								if (c_end == -1) {
									c_end = c_value.length;
								}
								c_value = unescape(c_value.substring(c_start, c_end));
							}
							return c_value;
						}
					</script>
				</body>
				</html>