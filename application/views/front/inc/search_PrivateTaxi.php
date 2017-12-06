<div id="searchBusSection">
<section class="promo box box-double-dark route-finder search-box">
    <div class="col-md-12">
  <div class="about-top">
    <div class="col-md-12">
      <div class="col-md-6 col-sm-12 col-xs-12 about-veh">
        <span><i class="paygo"></i></span>
        <span><i class="smartluy"></i></span>
        <span><i class="wing"></i></span>
        <span><i class="emoney"></i></span>
        <span><i class="fa fa-cc-visa"></i></span>
        <span><i class="fa fa-cc-jcb"></i></span>
        <span><i class="fa fa-cc-mastercard"></i></span>
        <!-- <span><i class="fa fa-cc-paypal"></i></span> -->
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12 about-routes">
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
      <form class="route-finder-form" action="/" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
        <div class="row">
          <div class="col-md-3 col-sm-12 subject">
            <div class="input-group origin-box">
              <input id="txtPrivateTaxiOrigin" name="txtOrigin" class="form-control search-control" type="text" placeholder="Select place of origin" autocomplete="off">
              <span class="input-group-btn">
                <a class="btn btn-default btn-search-control-addon" id="btnPrivateTaxiRemoveOrigin">
                  <span class="glyphicon glyphicon-remove"></span>
                </a>
              </span>
            </div>
          </div>
          <div class="col-md-1 col-sm-12">
            <a class="btn btn-swap" id="btnPrivateTaxiSwap"><i class="fa fa-exchange"></i></a>
          </div>
          <div class="col-md-3 col-sm-12 subject">
            <div class="input-group destination-box">
              <input id="txtPrivateTaxiDestination" name="txtDestination" class="form-control search-control" type="text" placeholder="Select destination" autocomplete="off">
              <span class="input-group-btn">
                <a class="btn btn-default btn-search-control-addon" id="btnPrivateTaxiRemoveDestination">
                  <span class="glyphicon glyphicon-remove"></span>
                </a>
              </span>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="input-group date-box">
              <input id="txtPrivateTaxiDate" name="txtDate" class="form-control search-control pull-left" type="text" placeholder="Departure Date" readonly="">
              <span class="input-group-btn">
                <a class="btn btn-default btn-search-control-addon" id="btnPrivateTaxiShowCalendar" name="btnShowCalendar">
                  <span class="glyphicon glyphicon-calendar"></span>
                </a>
              </span>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <a type="submit" class="btn btn-cta btn-find" id="btnPrivateTaxiFind"><i class="fa fa-search"></i> Find Tickets</a>
          </div>
        </div>
</form>      <form class="hidden" id="private-taxi-ticket-search-hidden" action="/en/search/private_taxi" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
        <input type="hidden" name="from" id="private_taxi_from">
        <input type="hidden" name="to" id="private_taxi_to">
        <input type="hidden" name="on_date" id="private_taxi_on_date">
        <input type="hidden" name="type" id="type" value="VehicleTypePrivateTaxi">
        
</form>    </div>
  </section>
</div>