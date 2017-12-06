<?php 
function sanitize_output($buffer) { 
	$search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!-- (.|\s)*? -->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );
	$buffer = preg_replace($search, $replace, $buffer); 
	return $buffer; 
} 
ob_start(); 
$mainpage_url = basename($_SERVER["PHP_SELF"]);
?> 
<?php
date_default_timezone_set('Asia/Phnom_Penh');
function curPageURL() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
	include_once('admin/initial.php');
	include_once(LIBRARY.DS.'property'.DS.'tbl-page-description.php');
	$page_name = basename($_SERVER['PHP_SELF']);
	$page_description = PageDescription::findByPageName($page_name);    	
?>
<?php @$rand = rand(1111111111, 9999999999); ?>
<link rel="icon" href="/images/asset/favicon.ico" type="image/ico">
<link rel="alternate" href="https://www.i1booking.asia" hreflang="en" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="msvalidate.01" content="BBB540B22EA20C20C989D7233E362532" />
<meta name="yandex-verification" content="302b0e22dd7b578c" />
<meta property="article:author" content="https://www.facebook.com/vcu.asia/" />
<meta property="article:publisher" content="https://www.facebook.com/profile.php?id=100011964251234" />
<meta name="author" content="I1Booking">
<meta property="og:url"                content="<?php echo curPageURL(); ?>" />
<meta property="og:type"               content="article" />
<?php if($mainpage_url !="bus.php"){ ?>
<title><?php echo $page_description['page_name']; ?></title>
<meta name="keywords" content="<?php echo $page_description['site_keyword']; ?>" />
<meta name="description" content="<?php echo $page_description['site_description']; ?>"/>
<meta property="og:title"              content="<?php echo $page_description['page_name']; ?>" />
<meta property="og:description"        content="<?php echo $page_description['site_description']; ?>" />
<meta property="og:image"              content="https://www.i1booking.com/<?php echo PageDescription::ThumnailImagePath($page_description['id']); ?>" />
<?php } ?>
<link href="/css/style.min.css" rel="stylesheet">