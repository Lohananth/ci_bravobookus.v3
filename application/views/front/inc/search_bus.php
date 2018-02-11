<div id="searchBusSection">
  <section class="promo box box-double-dark route-finder search-box">
    <div class="col-md-12">
  <div class="about-top">
    <div class="col-md-12">
      <div class="col-md-6 col-sm-12 col-xs-12 about-veh" style="font-size: 34px;">
        <span><i class="paygo"></i></span>
        <span><i class="smartluy"></i></span>
        <span><i class="wing"></i></span>
        <span><i class="emoney"></i></span>
        <span><i class="fa fa-cc-visa"></i></span>
        <span><i class="fa fa-cc-jcb"></i></span>
        <span><i class="fa fa-cc-mastercard"></i></span>
        <!-- <span><i class="fa fa-cc-paypal"></i></span> -->
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12 about-routes" style="font-size: 14px;">
        <div class="pop-routes">
          <span>Phnom Penh</span>
          <span>Siem Reap</span>
          <span>Battambang</span>
          <span>Bangkok</span>
          <span>Ho Chi Minh</span>
          <span>4000 Islands</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
      <form class="route-finder-form" action="<?php echo site_url(); ?>search" accept-charset="UTF-8" method="get">
        <!-- <input name="utf8" type="hidden" value="✓"> -->
        <input name="utf8" type="hidden" value="✓">
        <input type="hidden" name="from" value="<?php echo $from; ?>" id="bus_from">
        <input type="hidden" name="to" value="<?php echo $to; ?>" id="bus_to">
        <!-- <input type="hidden" name="departure" id="bus_on_date"> -->
        <input type="hidden" name="type" id="type" value="VehicleTypeBus">

        <div class="row">
          <div class="col-md-3 col-sm-12 subject">
            <div class="input-group origin-box">
              <input id="txtBusOrigin" name="txtOrigin" value="<?php echo $origin; ?>" class="form-control search-control" type="text" placeholder="Select place of origin" autocomplete="off">
              <span class="input-group-btn">
                <a class="btn btn-default btn-search-control-addon" id="btnBusRemoveOrigin">
                  <span class="glyphicon glyphicon-remove"></span>
                </a>
              </span>
            </div>
          </div>
          <div class="col-md-1 col-sm-12">
            <a class="btn btn-swap" id="btnBusSwap" style="background-color:  #0079c1
;"><i class="fa fa-exchange"></i></a>
          </div>
          <div class="col-md-3 col-sm-12 subject">
            <div class="input-group destination-box">
              <input id="txtBusDestination" name="txtDestination" class="form-control search-control" value="<?php echo $dest; ?>" type="text" placeholder="Select destination" autocomplete="off">
              <span class="input-group-btn ">
                <a class="btn btn-default btn-search-control-addon" id="btnBusRemoveDestination">
                  <span class="glyphicon glyphicon-remove"></span>
                </a>
              </span>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
          	<?php $now_day=date("Y-m-d"); ?>
            <div class="input-group date-box">
              <input id="txtBusDate" name="txtBusDate" value="<?php echo $book_date; ?>" class="form-control search-control pull-left" type="text"  placeholder="<?php echo $now_day; ?>" readonly="">
              <span class="input-group-btn">
                <a id="btnBusShowCalendar" class="btn btn-default btn-search-control-addon"  name="btnShowCalendar">
                  <span class="glyphicon glyphicon-calendar"></span>
                </a>
              </span>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <button type="submit" class="btn btn-success btn-lg btn-block" id="btnBusFind" style="background-color:  #0079c1
;"><i class="fa fa-search"></i> Find Tickets</button>
          </div>
        </div>
</form>    

<!-- <form class="hidden" id="bus-ticket-search-hidden" action="#" accept-charset="UTF-8" method="get">
        <input name="utf8" type="hidden" value="✓">
        <input type="hidden" name="from" id="bus_from">
        <input type="hidden" name="to" id="bus_to">
        <input type="hidden" name="on_date" id="bus_on_date">
        <input type="hidden" name="type" id="type" value="VehicleTypeBus">
        
</form>  --> 

</div>
</section>
</div>