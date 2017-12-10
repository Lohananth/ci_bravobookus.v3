

<!-- Result -->
<div class="row container-result-item pd-result-item" id="search-results-list">
<?php //echo "<h1> $origin and $dest and $book_date </h1>"; ?>
<?php 
  foreach ($vehicles as $value) {
    // echo $value['v_id'] ." - ". $value['company_name'] ." ";
   } 
?>
  
<?php 
foreach ($vehicles as $rows) {
// for($i=1;$i<5;$i++){
  ?>
  <div class="container-search-result ">
    <div class="col-md-12 container-box">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12 pt-10" style=" border-left-style: solid;   border-left-width: 6px; border-left-color:#2196F3;">
          <div class="row hidden-lg hidden-md hidden-sm small-operator">
            <div class="col-xs-8 pr-0 pl-0">
                <div class="layout-xs-operator">
                      <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-operator-id="8" title="Click to view details" class="trackrable operator-small-xs">
                          <img class="logo-operator-search-result" alt="Seila Angkor Express" src="<?php echo base_url(); ?>uploads/vechicle/<?php echo $rows['logo']; ?>">
                      </a>        
                      <div class="title-name-operator"><?php echo $rows['company_name']; ?></div>
                      <div class="rating-sm-layout">
                        <i class="fa fa-star rated-star star-sm" style="cursor: default"></i><i class="fa fa-star rated-star star-sm" style="cursor: default"></i><i class="fa fa-star rated-star star-sm" style="cursor: default"></i><i class="fa fa-star-half-o star-sm" style="cursor: default">                          
                        </i>
                        <i class="fa fa-star unrated-star } star-sm" style="cursor: default"></i>
                      </div>
                </div>
            </div>
            <div class="col-xs-4 pl-0 pr-0 subtitle">
              <div class="layout-review-small">
                  <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-tab-name="customer-review" data-operator-id="8" data-trackr-action="review-search-result" data-trackr-props="{&quot;operator_name&quot;:&quot;Seila Angkor Express&quot;,&quot;vehicle_type_name&quot;:&quot;VVIP Night Bus&quot;,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination:Siem Reap,&quot;on_date&quot;:&quot;23/11/2017&quot;}" style="cursor: pointer;" title="Review rating" class="btnrating trackrable">
                    <span class="title-board" >39 Reviews</span>
                  </a>  
              </div>
            </div>

          </div>

          <div class="row pd-box-small">
            <div class="col-md-3 col-sm-3 hidden-xs departure-boder-right layout-operaotr-log">
              <div href="" class="container-logo-operator subtitle">
                <p class="name-operator title label-operator"><?php echo $rows['company_name']; ?></p>
                  <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-operator-id="8" title="Click to view details">
                      <img class="image-operator-lg" alt="<?php echo $rows['company_name']; ?>" src="<?php echo base_url(); ?>uploads/vechicle/<?php echo $rows['logo']; ?>">
                  </a>                
                  
                  <div class="rating subtitle mt--5">
                    <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-tab-name="customer-review" data-operator-id="8" data-trackr-action="review-search-result" data-trackr-props="{&quot;operator_name&quot;:&quot;Seila Angkor Express&quot;,&quot;vehicle_type_name&quot;:<?php echo $rows['vehicle_type']; ?>,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination&quot;:&quot;Siem Reap&quot;,&quot;on_date&quot;:&quot;23/11/2017&quot;}" style="cursor: pointer;" title="Review rating" class="btnrating trackrable">
                      <div>
                        <!-- <i class="fa fa-star rated-star star-sm" style="cursor: default"></i>
                        <i class="fa fa-star rated-star star-sm" style="cursor: default"></i>
                        <i class="fa fa-star rated-star star-sm" style="cursor: default"></i>
                        <i class="fa fa-star-half-o star-sm" style="cursor: default"></i>
                        <i class="fa fa-star unrated-star } star-sm" style="cursor: default"></i> -->
                        <?php 
                            for($i=1;$i<=$rows['Rank'];$i++){
                              // echo "★ ";
                              echo '<i class="fa fa-star rated-star star-sm" style="cursor: default"></i>';
                            }
                            if($rows['Rank']<5){
                              for($i=5;$i>$rows['Rank'];$i--){
                                echo "☆";
                              }
                            }
                            ?>

                      </div>
                      <div class="title-board">No Reviews</div>
                      </a>
                  </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-6 subtitle pl-left">
              <p><span class="label">DEPARTURE :</span><span class="title name"><?php echo "$origin"; ?></span></p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 subtitle pd-right">
              <p><span class="label">ARRIVAL :</span><span class="title name"><?php echo $dest; ?></span></p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-5 subtitle departure-boder-right pl-left-depart">
              <p class="time"><span class="number" style="display: none"><?php echo date('H.i', strtotime($rows['time'])) ?></span><?php echo date('H:i', strtotime($rows['time'])) ?> <sup><i class="fa fa-clock-o"></i></sup></p>
              <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-tab-name="boarding-point" data-trackr-action="search-result-boarding-point" data-trackr-props="{&quot;operator_name&quot;:&quot;Seila Angkor Express&quot;,&quot;vehicle_type_name:<?php echo $rows['vehicle_type']; ?>,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination&quot;:&quot;Siem Reap&quot;,&quot;on_date&quot;:&quot;23/11/2017&quot;}" title="Click to view boarding point" class="title-board trackrable">
                <i class="fa fa-map-marker fa-lg icon-stop-point"></i>Boarding Point
</a>            </div>
            <div class="col-md-3 col-sm-3 col-xs-2 subtitle pd-duration ">
                <div class="text-center">
                  <span class="title-duration">
                    <div data-toggle="tooltip" title="Duration" class="durati"><i class="fa fa-clock-o"></i> <?php echo $rows['travel_duration'] ?> hours </div></span>
              </div>
                <div class="border-duration"></div>
                <div class="round-box"></div>
                <div class="text-center title-vehicle-name">
                  <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-tab-name="gallery" data-trackr-action="search-result-vehicle-name" data-trackr-props="{&quot;operator_name:<?php echo $rows['vehicle_type']; ?>;vehicle_type_name:<?php echo $rows['vehicle_type']; ?>,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination&quot;:&quot;Siem Reap&quot;,&quot;on_date&quot;:&quot;23/11/2017&quot;}" title="Click to view gallery" class="title-board trackrable">
                    <?php echo $rows['vehicle_type']; ?>
                    <!-- Toyota Hiace -->
                    <!-- Van11 -->
</a>                </div>
                <div class="col-md-12 container-gallery">
                  <div class="layout-gallery">
                    <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-tab-name="gallery" data-trackr-action="search-result-vehicle-gallery" data-trackr-props="{&quot;operator_name&quot;:&quot;Seila Angkor Express&quot;,&quot;vehicle_type_name:VVIP Night Bus,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination&quot;:&quot;Siem Reap&quot;,&quot;on_date&quot;:&quot;23/11/2017&quot;}" title="Click to view gallery" class="trackrable">

                      <img class="search-gallery" src="<?php echo base_url(); ?>public/img/<?php echo $rows['feature_image']; ?>" alt="<?php echo $rows['feature_image']; ?>">
                    </a>

                  </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-3 col-xs-5 subtitle departure-boder-left pd-right">
              <p class="time"><?php $arrival_time =  strtotime("+{$rows['travel_duration']} hours", strtotime($rows['time'])); echo date('H:i', $arrival_time); ?> <sup><i class="fa fa-clock-o"></i></sup></p>
              <a href="#" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-tab-name="drop-off-point" data-trackr-action="search-result-drop-off-point" data-trackr-props="{&quot;operator_name&quot;:&quot;Seila Angkor Express&quot;,&quot;vehicle_type_name&quot;:&quot;VVIP Night Bus&quot;,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination&quot;:&quot;Siem Reap&quot;,&quot;on_date&quot;:&quot;23/11/2017&quot;}" title="Click to view drop-off point" class="title-board trackrable">
                <i class="fa fa-map-marker fa-lg icon-stop-point"></i>Drop-off Point
</a>            </div>
          </div>



          <div class="row container-detail hidden-sm hidden-xs" style="margin-right: -35px;">
            <div class="col-sm-6 text-left pd hidden">
              <a class="title-more-detail" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-operator-id="8" title="Click to view details">
                More detail
              </a>
              <a class="title-more-detail" data-target="#modal-detail" data-toggle="modal" data-value="2281" data-operator-id="8" title="Click to view details">
                <div class="icon-more-detail"><i class="fa fa-angle-right"></i></div>
              </a>
            </div>
            <div class="col-sm-6 pd pt-10 text-right pull-right pr-15">
              <span>
                <img width="15px" height="20px" src="https://dpv1ddwbqfvsu.cloudfront.net/assets/seats/seat_available_sample-b34a2b821f6957ef8ed3dfefacd4abc9.png" alt="Seat available sample">
              </span>
              <span class="title-seat-avaible" style="background-color: #ff9800; padding:5px; border-radius: 50%;"><?php echo $rows['available_seats'] ?> </span>
              <span class="label-seat-avaible" style="background-color: #4CAF50;padding:4px; border-radius: 30px;color:white;"> Seats available</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 layout-book">

          <div class="layout-bg-book box-pd">
            <div class="hidden-xs hidden-sm mb-10" style=" border-left-style: solid;   border-left-width: 3px; border-left-color:#2196F3; padding-left:5px; background-color:#e68a00; color:white; width: 80px; border-top-right-radius: 10px;border-bottom-right-radius: 10px; "> Amenities</div>
            <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-7 layout-amenity">
                <?php $bus_amenities = explode(",", $rows['amenities']) ?>
                <?php foreach($amenities as $amenity): ?>
                  <?php for($i=0; $i<count($bus_amenities); $i++): ?>
                    <?php if($amenity['id']==$bus_amenities[$i]): ?>
                      <span class="amenity amenity-<?php echo mb_strtolower($amenity['amenity']) ?>" title="<?php echo $amenity['amenity'] ?>"></span>
                    <?php endif ?>
                  <?php endfor ?>
                <?php endforeach ?>
              </div>
              <div class="col-sm-6 col-xs-5 title-seat-left hidden-lg hidden-md">
                <div class="hidden-lg hidden-md seat-hidden" style="background-color: #ff9800; padding:5px; border-radius: 5px;">35 Seats Left</div>
              </div>
            </div>
            <div class="container-btn-book-search">

              <h5 class="title-price-book-search" style="color: #2196F3;">
                <?php 
                  if($currencies==''){
                      $currency_type='USD';
                    }else{
                      $currency_type=$currencies;
                    }  
                    ?>
                    <?php echo $currency_type ." ". $rows['local_price'] ." - " . $rows['foreigner_price']; ?>
              </h5>

              <!-- If departure is over -->
                <a style="width: 75%; border-radius: 0px;padding:7px;" class="btn btn-book-search trackrable" data-trackr-action="book-now" data-trackr-props="{&quot;operator_name&quot;:&quot;Seila Angkor Express&quot;,&quot;vehicle_type_name&quot;:&quot;VVIP Night Bus&quot;,&quot;id&quot;:2281,&quot;departure_time&quot;:&quot;11:00 PM&quot;,&quot;origin&quot;:&quot;Phnom Penh&quot;,&quot;destination&quot;:&quot;Siem Reap&quot;,&quot;on_date&quot;:&quot;23-11-2017}" href="<?php echo site_url();?>tickets?on_date=23-11-2017&amp;route_schedule_vehicle_id=2281">Book Now</a>
                <a style="padding:3px;" class="btn btn-info js-tripInfo col-xs-3 modal5ms nopadding-x trip-info" data-href="/en/travel/siem-reap/bangkok/143669-9481-4055?date=2017-12-15&amp;_preview=true&amp;people=1" data-modal-title="Siem Reap Transport Co → Morchit, Bangkok" data-event="info" data-action="click">
      <i class="fa fa-info-circle fa-2x"></i>
    </a>

            

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Bus Info -->
  <div class="pt-10"></div>
  <?php
}

?>

  

  
  </div>
<!-- End Result -->