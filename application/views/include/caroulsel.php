<div class="container">
  <div id="owl-demo" class="owl-carousel">
    <?php
    $home_photo_slide = HomePhotoSlide::findAll();
    foreach($home_photo_slide as $home_photo_slide_tmp): ?>
    <div class="item">
      <a href="<?php echo $home_photo_slide_tmp['link']; ?>">
        <img src="/<?php echo HomePhotoSlide::homePhotoSlideImagePath($home_photo_slide_tmp['id']);?>" alt="<?php echo $home_photo_slide_tmp['title']; ?>"/>
        <span class="h_ca_ca">
          <span class="title">
            <?php echo $home_photo_slide_tmp['title']; ?>
          </span>
          <span class="des">
            <?php echo $home_photo_slide_tmp['description']; ?>
          </span>
        </span>
      </a>
    </div>
    <?php
    endforeach;
    ?>
  </div>
</div>