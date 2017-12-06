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
            <form class="route-finder-form" action="/en" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
              <div class="row">

                <div class="col-md-4 col-sm-12 subject">
                  <div class="input-group">
                     <!-- <input id="searchbox" type="text" class="form-control search-control"/> -->
                     <select class="selectpicker form-control search-control" data-live-search="true" >
                      <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                      <option data-tokens="mustard">Burger, Shake and a Smile</option>
                      <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>


                    <span class="input-group-btn">
                      <a class="btn btn-default btn-search-control-addon" id="btnBusRemoveOrigin">
                        <span class="glyphicon glyphicon-remove"></span>
                      </a>
                    </span>
                  </div>
                </div>
                
                <div class="col-md-3 col-sm-12 subject">
                  <div class="input-group destination-box">
                    <input id="txtBusDestination" name="txtDestination" class="form-control search-control" type="text" placeholder="Select destination" autocomplete="off">
                    <span class="input-group-btn ">
                      <a class="btn btn-default btn-search-control-addon" id="btnBusRemoveDestination">
                        <span class="glyphicon glyphicon-remove"></span>
                      </a>
                    </span>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="input-group date-box">
                    <input id="txtBusDate" name="txtDate" class="form-control search-control pull-left" type="text" placeholder="Departure Date" readonly="">
                    <span class="input-group-btn">
                      <a class="btn btn-default btn-search-control-addon" id="btnBusShowCalendar" name="btnShowCalendar">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </a>
                    </span>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <a type="submit" class="btn btn-success btn-lg btn-block" id="btnBusFind" style="background-color:  #009900
        ;"><i class="fa fa-search"></i> Find Tickets</a>
                  </div>
                </div>
        </form>  
        <form class="hidden" id="bus-ticket-search-hidden" action="/en/search" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
                <input type="hidden" name="from" id="bus_from">
                <input type="hidden" name="to" id="bus_to">
                <input type="hidden" name="on_date" id="bus_on_date">
                <input type="hidden" name="type" id="type" value="VehicleTypeBus">        
        </form>  
      </div>
  </section>
</div>