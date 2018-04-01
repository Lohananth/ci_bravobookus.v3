<!DOCTYPE html>
<html lang="en">
<head>

<?php  
if($title==""){
$title="Welcome to Bravobookus.com, the best booking trip online";
}

 ?>
 <link rel="shortcut icon" href="<?php echo base_url() ?>public/img/favicon.ico" type="image/x-icon">
 
<title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Seat Map -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/assets/plugins/jsc/seat_styles.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets//css/validate.css">
  <!-- // Seat Map -->
  <script src="<?php echo base_url(); ?>front/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>front/assets/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/bootstrap.min.css">

  <!-- Awsom Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/font-awesome/css/font-awesome.min.css"> 

  <meta name="author" content="Sourng Online" />

<meta name="keywords" content="<?php echo $seo_keywords; ?>" />
<meta name="description" content="<?php echo $seo_description; ?> " />

<meta name="pinterest-rich-pin" content="false" />

<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:image" content="<?php echo base_url(); ?><?php echo $seo_image; ?>" />
<meta property="og:url" content="<?php echo $seo_url; ?>" />
<meta property="og:description" content="<?php echo $seo_description; ?>
" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:creator" content="<?php echo $twitter_creator; ?>" />
<meta name="twitter:title" content="<?php echo $title; ?>" />
<meta name="twitter:image:src" content="<?php echo base_url(); ?><?php echo $seo_image; ?>" />
<meta name="twitter:url" content="<?php echo $seo_url; ?>" />
<meta name="twitter:description" content="<?php echo $seo_description; ?>
" />

<meta itemprop="name" content="<?php echo $title; ?>" />
<meta itemprop="description" content="<?php echo $seo_description; ?>" />
<meta itemprop="image" content="<?php echo base_url(); ?><?php echo $seo_image; ?>" />

<!-- DateTime -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

 <!-- Main Style -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/main-style.css">

<link href="<?php echo base_url(); ?>front/assets/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>front/assets/js/bootstrap-toggle.min.js"></script>
<style>
    .pickup_form {
      display:none;
    }
  </style>
</head>
<body>
<!-- Nav -->
<?php include_once('inc/nav.php'); ?>
<!-- End Nav -->
<div class="container"> 
     <?php     
    //include_once('inc/search.php');
     ?>
</div>
 


<!--  Search Result -->

<div class="container">
  <ol class="breadcrumb">
						<li>You are here: </li>
						<li><a href="/">Home</a></li>
						<li class="active">Payment</li>
					</ol>
					<div class="article">
						<div class="row">
							<div class="col-sm-6 col-md-8">
								<img src="<?php echo base_url(); ?>front/images/promotion.jpg" width="100%" alt="Wing offer 10%">
								<div class="panel panel-danger">
									<div class="panel-heading">
										<h3 class="panel-title">Payment Methods</h3>
									</div>
									<div class="panel-body">
										<div class="well well-sm text-center">
											<h2 class="text-danger">Warning!</h2>

											<h3>Do not close your browser until payment completed<br/> 
												and please wait until your can see your ticket.</h3>
											</div>

											<p class="text-danger bg-warning">Local Payment (Cambodia)</p>
											<div>
												<div class="row">
													<div class="col-xs-3 col-md-2">
														<?php //include_once 'include/ipg/sml.php'; ?>
													</div>
													<div class="col-xs-3 col-md-2">
														<?php //include_once("include/functions.php") ?>
														<form action="include/wing/send-data.php" method="post">
															<input type="hidden" name="item" value="<?php //echo Encrypt('mykey', $invoice_no); ?>">
															<input type="hidden" name="amount" value="<?php //echo Encrypt('mykey', $amount); ?>">
															<input type="hidden" name="passenger_name" value="<?php //echo Encrypt('mykey', $passenger_name); ?>">
														 	<button type="submit" name="a" id="a"><img src="<?php echo base_url(); ?>front/images/payment-logo/wing.png" width="100" alt=""></button>
														</form>
													</div>
												</div>
												
												
											</div>
											<p class="text-danger bg-warning">International Payment Methods</p>
											<div>
												<form action="<?php echo base_url(); ?>payment/do" method="post" accept-charset="UTF-8">
													<input type="hidden" name="Title" value="<?php echo 'PHP VPC 3 Party Transacion'; ?>">
													<input type="hidden" name="virtualPaymentClientURL" size="63" value="<?php echo 'https://migs.mastercard.com.au/vpcpay'; ?>">
													<input type="hidden" name="vpc_Version" value="<?php echo '1'; ?>" size="20" maxlength="8">
													<input type="hidden" name="vpc_Command" value="<?php echo 'pay'; ?>" size="20" maxlength="16">
													<input type="hidden" name="vpc_AccessCode" value="<?php echo '81FF5EF1'; ?>">
													<input type="hidden" name="vpc_MerchTxnRef" value="<?php echo $booking_detail->booking_code; ?>">
													<input type="hidden" name="vpc_Merchant" value="<?php echo 'VCUTRAVEL'; ?>">
													<input type="hidden" name="vpc_OrderInfo" value="<?php echo $booking_detail->passenger_name; ?>">
													<input type="hidden" name="vpc_Amount" value="<?php echo ($booking_detail->price*100); ?>">
													<input type="hidden" name="vpc_Locale" value="<?php echo 'en'; ?>" size="20" maxlength="5">

													<input type="hidden" name="vpc_ReturnURL" size="63" value="<?php echo base_url(); ?>payment/respone">
													<button type="submit" name="SubButL"><img src="<?php echo base_url(); ?>front/images/payment-logo/payment_visa.png" /> <img src="<?php echo base_url(); ?>front/images/payment-logo/payment_master.png" /></button>
												</form>
											</div>
											<p class="text-danger bg-warning">Direct talk here!</p>
											<p>No any of the payment methods above? No problem! Click on the icon below to talk with us now!</p>
											<p class="text-center"><button id="button-talk-chat"><img src="<?php echo base_url(); ?>front/images/chat.png" alt="" width="80"></button></p>
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
												<td><?php echo date('Y-m-d'); ?></td>
											</tr>
											<tr>
												<td>Invoice No.:</td>
												<td>#<?php echo str_pad($booking_detail->booking_code, 6, '0', STR_PAD_LEFT); ?></td>
											</tr>
											<tr>
												<td>Passenger Name:</td>
												<td><?php echo $booking_detail->passenger_name ?>  <?php  ?></td>
											</tr>
											<tr>
												<td>Seats Number:</td>
												<td><?php echo $booking_detail->seat_number ?></td>
											</tr>
											<tr>
												<td>Email:</td>
												<td><?php echo $booking_detail->email ?></td>
											</tr>
											<tr>
												<td>Phone Number:</td>
												<td><?php echo $booking_detail->phone ?></td>
											</tr>
											<tr>
												<td>Bus Type</td>
												<td><?php echo $booking_detail->vehicle_type ?></td>
											</tr>
											<tr>
												<td>Destination</td>
												<td><?php echo $booking_detail->origin ?> &#10140; <?php echo $booking_detail->destination ?></td>
											</tr>
											<tr>
												<td>Amount pay ($):</td>
												<td>$ <?php echo $booking_detail->price ?></td>
											</tr>
											<tr>
												<td>Tax ($):</td>
												<td>$ 0</td>
											</tr>
											<tr>
												<td>Total pay ($):</td>
												<td><span class="text-danger"><strong>$ <?php echo $booking_detail->price ?></strong></span></td>
											</tr>

										</tbody>
									</table>
									<img src="/images/promotion/wing_10_off.jpg" width="100%" alt="Wing offer 10%">
								</div>
							</div>
						</div>
  
</div>

<!-- End Search Result -->


<div class="container text-center">    
  <div style="background-color: #010B50; color:white; padding:2px; width: 200px; height: 39px; font-size: 22px;"><i class="fa fa-users" aria-hidden="true"></i>
    Our Recomands     
  </div>
    <div style=" border-bottom-style: solid; border-bottom-color:#0219B4; border-width:4px;">
  </div>
  <br>
  <div class="row">
   <?php
   for($i=1;$i<=12;$i++){
   ?>
    <div class="col-sm-2 col-xs-4" style="margin-bottom: 20px;">
          <a href="/en/ekareach-express" data-toggle="tooltip"  title="Company <?php echo $i; ?>!">
         <img id="myImg" class="img-responsive partners-list" style="margin: 0 auto; " alt="" src="<?php echo base_url(); ?>front/images/logo/logo<?php echo $i ; ?>.png">
  </a> 
  </div>
   <?php
 }
   ?>   
  </div></div><br>


<div class="m-t-3"></div>

<footer class="mainfooter" role="contentinfo" style="background-color: #0E6655;color: white;">
 
  <div class="footer-middle" >
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Address</h4>
          <address>
                <ul class="list-unstyled">
                  <li>
                    City Hall<br>
                    212  Street<br>
                    Lawoma<br>
                    735<br>
                  </li>
                  <li>
                    Phone: 0
                  </li>
                </ul>
              </address>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Services</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">Payment Center</a></li>
            <li><a href="#">Contact Directory</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">News and Updates</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Website Information</h4>
          <ul class="list-unstyled">
            <li><a href="#">Website Tutorial</a></li>
            <li><a href="#">Accessibility</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Webmaster</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Departments</h4>
          <ul class="list-unstyled">
            <li><a href="#">Parks and Recreation</a></li>
            <li><a href="#">Public Works</a></li>
            <li><a href="#">Police Department</a></li>
            <li><a href="#">Fire</a></li>
            <li><a href="#">Mayor and City Council</a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>

</footer>
  <div class="footer-bottom" style="background-color: #0B5345; padding-bottom: 15px; padding-top: 15px; color: white;">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <!--Footer Bottom-->
          <p class="text-xs-center">&copy; Copyright 2016 - City of USA.  All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>



 <!-- Seat Map -->

  <!-- End Seat Map -->
  




</body>
</html>
