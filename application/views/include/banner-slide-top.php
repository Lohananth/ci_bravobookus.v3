<?php
include_once(LIBRARY.DS.'property'.DS.'tbl-page-description.php');
include_once(LIBRARY.DS.'property'.DS.'tbl-page-slider.php');
?>
<div class="banner">
  <div class="header">
    <?php include_once 'include/top-menu.php'; ?>		 
  </div>
</div>
<div id="owl-demo_2" class="owl-carousel owl-theme">
<?php
$page = PageDescription::findByPageName(basename($_SERVER['PHP_SELF']));
$slide = PageSlider::findByPageID($page['id']);
foreach($slide as $slide_tmp):
?>
  <div class="item">
    <img src="<?php echo PageSlider::pageSliderImagePath($slide_tmp['id']);?>" alt="<?php echo $slide_tmp['slide_title']; ?>">
    <div class="banner-text wow fadeInUp" data-wow-delay="0.5s">
      <h1><?php echo $slide_tmp['slide_title']; ?></h1>
    </div>
  </div>
<?php endforeach; ?>

</div>
<div class="clearfix"></div> 
<?php include 'include/booking-form.php'; ?>
