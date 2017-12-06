<?php 
	include_once("daily-booking/class/config.php");
	include_once("daily-booking/class/class-database.php");
	include_once("daily-booking/class/class-control.php");
	include_once("daily-booking/class/departure-time.php");
  include_once("daily-booking/class/origin.php");
?>
<link rel="stylesheet" href="/select/css/bootstrap/bootstrap.min.css">
<style type="text/css">
.dir_button img, .dir_button p.text-mode {
	display: none;
}
button.dir_button {
  padding: 8px 10px;
  border: 0;
  font-size:17px;
}
</style>
<div class="booking-form">
  <div class="online_reservation">
    <div class="b_room">
      <div class="booking_room">
        <div class="reservation">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div style="margin-top: 8px;">
              <a href="http://www.smart.com.kh/smartluy" target="_blank"><img src="/images/asset/SmartLuyLogo_OK-01.png" alt="Smart Luy"></a>&nbsp;
              <a href="https://www.wingmoney.com/" target="_blank"><img src="/images/asset/wing.png" alt="Smart Luy"></a>&nbsp;
              <a href="http://www.canadiabank.com.kh/en/opg_service.aspx" target="_blank"><img src="/images/asset/payment_master.png"  alt="canadiabank"></a>&nbsp;
              <a href="http://www.canadiabank.com.kh/en/opg_service.aspx" target="_blank"><img src="/images/asset/payment_visa.png" alt=""></a>&nbsp;<br>
            </div>
          </div>
          <div class="col-sm-9 col-md-9">
            <div style="color: #FFF; font-size: 25px; text-transform: uppercase; text-align: center; text-decoration: underline; margin-bottom: 25px;"> Start your booking here </div>
          </div>
        </div>
          <div class="close_me"><i class="glyphicon glyphicon-remove-circle"></i></div>
          <form action="/find-booking.php" method="GET" id="find-booking">
            <div class="row">
              <div class="col-sm-6 col-md-3 col-lg-3"> 
                <h5>Select Origin:</h5>
                <div id="origin" class="selectpicker" data-clear="true" data-live="true"> <a href="#" class="clear"><span class="fa fa-times"></span><span class="sr-only">Cancel the selection</span></a>
                  <button data-id="prov" type="button" id="directionfrom" class="dir_button btn btn-lg btn-block btn-default dropdown-toggle"> <span class="placeholder">Origin</span> <span class="caret"></span> </button>
                  <div class="dropdown-menu">
                    <div class="live-filtering" data-clear="true" data-autocomplete="true" data-keys="true">
                      <label class="sr-only" for="input-bts-ex-5">Search in the list</label>
                      <div class="search-box">
                        <div class="input-group"> <span class="input-group-addon" id="search-icon5"> <span class="fa fa-search"></span> <a href="#" class="fa fa-times hide filter-clear"><span class="sr-only">Clear filter</span></a> </span>
                          <input type="text" placeholder="Search in the list" id="input-bts-ex-5" class="form-control live-search" aria-describedby="search-icon5" tabindex="1" />
                        </div>
                      </div>
                      <div class="list-to-filter">
                        <ul class="list-unstyled">
                            <?php $oriObj = new Origin; $oriObj->conn(); $origin = $oriObj->getAll("ORDER BY order_by ASC") ?>
                            <?php foreach($origin as $row): ?>
                              <li class="filter-item items" data-filter="<?php echo $row->origin ?>" data-value="<?php echo $row->id ?>"><img src="/daily-booking/images/direction-photo/<?php echo $row->photo ?>" style="float:left; margin-right:5px;" alt="<?php echo $row->origin ?>"/><?php echo $row->origin ?>
                                <p class="text-mode"><small><?php echo $row->description ?></small></p>
                              </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="no-search-results">
                          <div class="alert alert-warning" role="alert"><i class="fa fa-warning margin-right-sm"></i>No entry for <strong>'<span></span>'</strong> was found.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="origin" required value="">
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3"> 
                <h5>Select Destination:</h5>
                <div id="destination" class="selectpicker" data-clear="true" data-live="true"> <a href="#" class="clear"><span class="fa fa-times"></span><span class="sr-only">Cancel the selection</span></a>
                  <button data-id="prov" type="button" id="directionto" class="dir_button btn btn-lg btn-block btn-default dropdown-toggle"> <span class="placeholder">Destination</span> <span class="caret"></span> </button>
                  <div class="dropdown-menu">
                    <div class="live-filtering" data-clear="true" data-autocomplete="true" data-keys="true">
                      <label class="sr-only" for="input-bts-ex-5">Search in the list</label>
                      <div class="search-box">
                        <div class="input-group"> <span class="input-group-addon" id="search-icon5"> <span class="fa fa-search"></span> <a href="#" class="fa fa-times hide filter-clear"><span class="sr-only">Clear filter</span></a> </span>
                          <input type="text" placeholder="Search in the list" id="input-bts-ex-5" class="form-control live-search" aria-describedby="search-icon5" tabindex="1" />
                        </div>
                      </div>
                      <div class="list-to-filter">
                        <ul class="list-unstyled">
                            <?php foreach($origin as $row): ?>
                              <li class="filter-item items" data-filter="<?php echo $row->origin ?>" data-value="<?php echo $row->id ?>"><img src="/daily-booking/images/direction-photo/<?php echo $row->photo ?>" style="float:left; margin-right:5px;" alt="<?php echo $row->origin ?>"/><?php echo $row->origin ?>
                                <p class="text-mode"><small><?php echo $row->description ?></small></p>
                              </li>
                              <?php endforeach ?>
                        </ul>
                        <div class="no-search-results">
                          <div class="alert alert-warning" role="alert"><i class="fa fa-warning margin-right-sm"></i>No entry for <strong>'<span></span>'</strong> was found.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="destination" required value="">
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group book_date">
                  <h5>Select Date:</h5>
                  <input name="departure" class="date" readonly id="datepicker" type="text" value="<?php echo date("Y-m-d", time() + 86400); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo date("Y-m-d", time() + 86400); ?>';}" required="" />
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                  <h5> </h5>
                  <input name="btnSubmit" id="find-ticket" type="button" class="btn btn-info btn-lg btn-block" value="Find Ticket" />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>