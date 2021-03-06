<?php  
if($title==""){
$title="Welcome to Bravobookus.com, the best booking trip online";
}

 ?>
<title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo base_url() ?>public/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/bootstrap.min.css">
  <script src="<?php echo base_url(); ?>front/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>front/assets/js/bootstrap.min.js"></script>  
  <!-- Awsom Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/font-awesome/css/font-awesome.min.css"> 
 <!-- Slide News -->
  <link rel=stylesheet href="<?php echo base_url(); ?>front/assets/css/news-style.css">

<!-- Auto Search Bootstrap -->  
  <!-- Search Tool Style -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/css-searching.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/search-result.css">

<!-- Code For Search -->
    <script src="<?php echo base_url(); ?>front/assets/search/js/jquery.js"></script>   
    <link href="<?php echo base_url(); ?>front/assets/search/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>front/assets/search/css/styles.css" rel="stylesheet" />
  <!-- End Code For Search -->


<meta name="author" content="Sourng Online" />

<meta name="keywords" content="<?php echo $seo_keywords; ?>" />
<meta name="description" content="<?php echo $seo_description; ?>
" />

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

