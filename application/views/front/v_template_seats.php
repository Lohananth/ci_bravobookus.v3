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
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/validate.css">
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
  <hr>
  <?php
    include_once('v_select_seat.php');
  ?>
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

<footer class="mainfooter" role="contentinfo" style="background-color: #002663;color: white;">
 
  <div class="footer-middle" >
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Address</h4>
          <address style="color:#146eb4;">
                <ul >
                  <div>
                    Siem Reap City,
                    Road #6<br>
                    Krong Siem Reap 17251,<br>
                    Kingdom of Cambodia<br>
                  </div>
                  <div>
                    Phone: (855)92 77 12 44
                  </div>
                </ul>
              </address>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Services</h4>
          <ul >
           
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
          <ul >
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
          <h4>Popular Routes</h4>
          <ul >
            <li><a href="#">Phnom Penh - Battambang</a></li>
            <li><a href="#">Phnom Penh - Siem Reap</a></li>
            <li><a href="#">Phnom Penh - Sihanuk</a></li>
            <li><a href="#">Phnom Penh - Kompong Cham</a></li>
            <li><a href="#">Phnom Penh - Hanoi</a></li>
            
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
