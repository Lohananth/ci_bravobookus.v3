<div class="container" id="">
		<ol class="breadcrumb">
			<li>You are here: </li>
			<li><a href="./">Home</a></li>
			<li class="active">Booking Seat</li>
		</ol>
		<div class="row">
			<div class="col-md-8">
				<form action="<?php echo base_url(); ?>tickets/add" id="booking_seat_form" class="form-horizontal booking-seat" method="post"> 
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">1. Seat Selection</h3>
						</div>
						<div class="panel-body">
							<input type="hidden" name="vsid" id="vsid" value="<?php echo $vehicle_schedule_id ?>" />
							<input type="hidden" name="c_id" id="c_id" value="<?php echo $vehicle_schedule_data->cid; ?>" />
							<input type="hidden" name="departure_date" id="dep" value="<?php echo $departure_date ?>" />
							<input type="hidden" name="origin" id="origin" value="<?php echo $vehicle_schedule_data->oid ?>" />
							<input type="hidden" name="destination" id="destination" value="<?php echo $vehicle_schedule_data->did ?>" />
							<input type="hidden" name="departure_time" id="departure_time" value="<?php echo $vehicle_schedule_data->departure_time ?>" />
							<input type="hidden" name="v_type" id="v_type" value="<?php echo $vehicle_schedule_data->vt_id ?>" />
							<input type="hidden" name="price" id="price" value="<?php echo $vehicle_schedule_data->local_price ?>" />
							<div class="row">
								<div class="col-md-8">
									<div class="table-responsive">
										<h5><?php if(isset($_GET['msg'])){ echo "Sorry these seats have been booking. Please choose other seats."; }?></h5>
										<div class="front-indicator">Front</div>
										<div id="seat-map"></div>
										<div id="legend"></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txtSelectedSeat">Selected Seat(s)</label>
										<ul id="selected-seats"></ul>
										<input type="text" id="booking_seat_array" name="booking_seat_array" value="" hidden="hidden" required>
									</div>
									<div class="form-group">
										<label for="txtTotalSeats">Total No. of Seats</label>
										<input id="counter" type="text" name="txtTotalSeats" class="form-control" readonly="true" value="0">
									</div>
									<div class="form-group">
										<label for="txtTotalPrice">Promotion Code:</label>
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search code...">
											<span class="input-group-btn">
												<button class="btn btn-warning rippler rippler-default" type="button">Find</button>
											</span>
										</div>
										<p>No promotion code (Discount <span class="text-warning">$</span> 
											<span class="text-warning" id="discount_rate">0.00</span>)</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">2. Passenger Details</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="nationality" class="col-sm-3 control-label">Nationality: <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<select name="nationality" id="nationality" class="form-control" required>
											<?php include_once 'inc/nationalities.php'; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="title" class="col-sm-3 control-label">Title:  <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<select name="title" id="title" class="form-control" required>
											<option value="" selected="selected" disabled="disabled">Select title</option>
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											<option value="Miss.">Miss.</option>
											<option value="Ms.">Ms.</option>
											<option value="Dr.">Dr.</option>
											<option value="Prof.">Prof.</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="f_name" class="col-sm-3 control-label">Name:  <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Family Name &nbsp; &nbsp;&nbsp;&nbsp; Given Name(s)">
									</div>
								</div>
								<div class="form-group">
									<label for="how_to_contact" class="col-sm-3 control-label">Contact By:</label>
									<div class="col-sm-9">
										<label class="radio-inline"><input type="radio" name="how_to_contact" value="1">Email only</label>
										<label class="radio-inline"><input type="radio" name="how_to_contact" value="2">Phone Number only</label>
									</div>
								</div>
								<div class="form-group fieldhidden" id="fieldhidden-1">
									<label for="email" class="col-sm-3 control-label">Email:  <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="email" class="form-control" id="email" required name="email" placeholder="Email address...">
									</div>
								</div>
								<div class="form-group fieldhidden" id="fieldhidden-2">
									<label for="phoneNumber" class="col-sm-3 control-label">Contact Number:  <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="tel" class="form-control" id="phoneNumber" required name="phoneNumber" value="" />
										<input type="hidden" id="output_phone" name="output_phone" value="Booking from">
									</div>
									<div class="col-sm-5" style="display: none">
										<select class="form-control" name="country"  id="address-country" readonly disabled=""></select>  
										<input type="hidden" id="country_txt" name="country_txt" style="width: 100%" value="">                                  
									</div>
								</div>
								<div class="form-group">
									<label for="toggle-event" class="col-sm-3 control-label">Pickup:  <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input id="toggle-event" type="checkbox" data-toggle="toggle"  data-size="small" data-width="100" data-on="Yes need" data-off="Don't need" data-onstyle="success" data-offstyle="danger">
										<div id="console-event"></div>
									</div>
								</div>
								<div class="form-group pickup_form">
									<label for="accommodation_name" class="control-label col-sm-2"></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="accommodation_name" required data-fv-notempty-message="This field is required" placeholder="e.g. Building name, Hotel name, restaurant, shop,..." />
									</div>
								</div>
								<div class="form-group pickup_form">
									<label for="full_address" class="control-label col-sm-2"></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="full_address" required data-fv-notempty-message="This field is required" placeholder="e.g. Street address, Building number and street name, example: 123 Main Street" />
									</div>
								</div>
								<div class="form-group pickup_form">
									<label for="full_address" class="control-label col-sm-2"></label>
									<div class="col-sm-9">
										<p class="bg-danger">
											<strong class="text-danger">Notice!</strong> A free pickup service is provided to major hotels in the downtown area within 2 Kilometers from the bus station. You will recieve an email from our team if your pickup request in not accepted.
										</p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" name="btnBuy" value="1" id="sub_seat_booking" class="btn btn-info rippler rippler-default">Buy Now</button> &nbsp;
										<button type="reset" id="button_reset" class="btn btn-defaul rippler rippler-bs-danger">Reset</button>
										<p id="msg"></p>	
									</div>
								</div>
							</div>
						</div>
					</form> 
				</div>
				<div class="col-md-4">
					<div class="well well-sm text-center">
						<strong class="panel-title">Trip Summary</strong>
					</div>
					<table class="table">
						<tbody><tr>
							<td>Direction</td>
							<td><a href="https://vcu.asia/find-booking.php?origin=<?php echo $vehicle_schedule_data->oid ?>&destination=<?php echo $vehicle_schedule_data->did ?>&departure=<?php echo date("Y-m-d", time() + 86400); ?>&btnSubmit=Find+Ticket"><span id="direction" class="important big"><?php echo $vehicle_schedule_data->origin ?> &#10140; <?php echo $vehicle_schedule_data->destination ?></span></a></td>
						</tr>
						<tr>
							<td>Departure</td>
							<td><span id="departure" class="important big"> &#128197; <?php echo $_GET['on_date'] ?> &#128336; <?php echo $vehicle_schedule_data->departure_time ?></span></td>
						</tr>
						<tr>
							<td>Operator</td>
							<td><a href="https://vcu.asia/bus.php?comid=<?php echo $vehicle_schedule_data->cid ?>"><span id="operator" class="important big"><?php echo $vehicle_schedule_data->company_name  ?></span></a></td>
						</tr>
						<tr>
							<td>Type</td>
							<td><span id="bus_type" class="important big"><?php echo $vehicle_schedule_data->vehicle_type ?></span></td>
						</tr>
						<tr>
							<td>Passenger</td>
							<td>&#128115; <label class="important big" id="lblPassenger">0</label></td>
						</tr>
						<tr>
							<td>Unit Price</td>
							<td><label id="unit_price" class="important big">$ <?php echo $vehicle_schedule_data->foreigner_price ?></label></td>
						</tr>
						<tr>
							<td>Sub Total</td>
							<td>
								<label class="important big" id="subtotal">$ 0.00
								</label>
							</td>
						</tr>
						<tr>
							<td>Discount</td>
							<td><label class="important big" id="lblDiscount">$ 0.00
							</label></td>
						</tr>
						<tr>
							<td>Total</td>
							<td><label class="important big" id="lblTotalPrice">$ 0.00</label></td>
						</tr>
					</tbody>
				</table>
				<hr>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#boarding-point" aria-controls="boarding-point" role="tab" data-toggle="tab">Boarding Point</a></li>
					<li role="presentation"><a href="#drop-off-point" aria-controls="drop-off-point" role="tab" data-toggle="tab">Drop Off Point</a></li>
					<li role="presentation"><a href="#operator-info" aria-controls="operator-info" role="tab" data-toggle="tab">Operator Info</a></li>

				</ul>
				<div class="tab-content">
					
					
					<div role="tabpanel" class="tab-pane active" id="boarding-point">
						<?php echo $vehicle_schedule_data->boarding_point ?>

					</div>
					<div role="tabpanel" class="tab-pane" id="drop-off-point">
						<?php echo $vehicle_schedule_data->drop_off ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="operator-info">
						<?php echo $vehicle_schedule_data->destination ?>
					
					</div>
					
				</div>

			</div>
		</div>
	</div>
<script src="<?php echo base_url(); ?>front/assets/plugins/jsc/jquery.seat-charts.js"></script>
<script src="<?php echo base_url(); ?>front/assets/js/formValidation.min.js"></script>
<script src="<?php echo base_url(); ?>front/assets/intl-tel-input/build/js/intlTelInput.min.js"></script>

  <script>
    $(document).ready(function() {
      function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
      }
      function generateCaptcha() {
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
      }
      generateCaptcha();
      $('#booking_seat_form')
      .find('[name="phoneNumber"]');
      var countryData = $.fn.intlTelInput.getCountryData(),
      telInput = $("#phoneNumber"),
      addressDropdown = $("#address-country");
      country_txt = $("#country_txt");

      telInput.intlTelInput({
        utilsScript: '<?php echo base_url(); ?>front/assets/intl-tel-input/build/js/utils.js',
        initialCountry: "auto",
        geoIpLookup: function(callback) {
          $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
          });
        },
      });
      telInput.on("keyup change", function() {
        var intlNumber = telInput.intlTelInput("getNumber");
        var output = $("#output_phone");
        if (intlNumber) {
          output.val(intlNumber);
        } else {
          output.val("Null value");
        }
      });

      $.each(countryData, function(i, country) {
        addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
      });

      var initialCountry = telInput.intlTelInput("getSelectedCountryData").iso2;
      addressDropdown.val(initialCountry);

      telInput.on("countrychange", function(e, countryData) {
        addressDropdown.val(countryData.iso2);
        country_txt.val(countryData.name);
      });

      addressDropdown.change(function() {
        telInput.intlTelInput("setCountry", $(this).val());
      });
      $('#booking_seat_form')
      .on('init.field.fv', function(e, data) {
        var $parent = data.element.parents('.form-group'),
        $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');
        $icon.on('click.clearing', function() {
          if ($icon.hasClass('glyphicon-remove')) {
            data.fv.resetField(data.element);
          }
        });
      })
      .formValidation({
        framework: 'bootstrap',
        icon: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        err: {
          container: 'tooltip'
        },
        fields: {
          txtTotalSeats: {
            validators: {
              greaterThan: {
                value: 1,
                message: 'Please Select at least 1 seat.'
              }
            }
          },
          nationality: {
            validators: {
              notEmpty: {
                message: 'Nationality is required'
              }
            }
          },
          title: {
            validators: {
              notEmpty: {
                message: 'Title is required'
              }
            }
          },
          f_name: {
            validators: {
              notEmpty: {
                message: 'The Full name is required'
              }
            }
          },
          booking_seat_array: {
            validators: {
              notEmpty: {
                message: 'Please select seat'
              }
            }
          },
          phoneNumber: {
            validators: {
              callback: {
                message: 'The phone number is not valid',
                callback: function(value, validator, $field) {
                  return value === '' || $field.intlTelInput('isValidNumber');
                }
              }
            }
          },
          email: {
            verbose: false,
            validators: {
              notEmpty: {
                message: 'The email address is required and can\'t be empty'
              },
              emailAddress: {
                message: 'The input is not a valid email address'
              },
              stringLength: {
                max: 512,
                message: 'Cannot exceed 512 characters'
              },
              remote: {
                type: 'GET',
                url: 'https://api.mailgun.net/v2/address/validate?callback=?',
                crossDomain: true,
                name: 'address',
                data: {
                  api_key: 'pubkey-83a6-sl6j2m3daneyobi87b3-ksx3q29'
                },
                dataType: 'jsonp',
                validKey: 'is_valid',
                message: 'The email is not valid'
              }
            }
          }
        }
      })
      .on('click', '.country-list', function() {
        $('#booking_seat_form').formValidation('revalidateField', 'phoneNumber');
      }) 
      .on('err.form.fv', function(e) {
        generateCaptcha();
      })
      .on('success.field.fv', function(e, data) {
        $( "#booking_form #address-country option:selected" ).text();
        if (data.field === 'startDate' && !data.fv.isValidField('endDate')) {
          data.fv.revalidateField('endDate');
        }
        if (data.field === 'endDate' && !data.fv.isValidField('startDate')) {
          data.fv.revalidateField('startDate');
        }
      });
      $('#button_reset').on('click', function() {
        $('#booking_seat_form').formValidation('resetForm', true);
      });
    });
$('#sub_seat_booking').click(function(){
  if($("#counter").val() <= '0'){
    Command: toastr["error"]("Please Select at least 1 seat.", "Seat Error!");
    $('html, body').animate({ scrollTop: $(".panel-heading").offset().top}, 500);
  }
  else if( !$('#nationality').val() ){
    Command: toastr["error"]("Please chose nationality", "Nationality Empty !");
    $('html, body').animate({ scrollTop: $("#nationality").offset().top}, 500);
  }
  else if( !$('#title').val() ){
    Command: toastr["error"]("Please chose title", "Title Empty !");
    $('html, body').animate({ scrollTop: $("#title").offset().top}, 500);
  }
  else if( !$('#f_name').val() ){
    Command: toastr["error"]("Please fill your full name.", "Name Empty !");
    $('html, body').animate({ scrollTop: $("#f_name").offset().top}, 500);
  }
  else if( !$('#phoneNumber').val() ){
    Command: toastr["error"]("Please give us your phone number.", "Phone Empty !");
    $('html, body').animate({ scrollTop: $("#phoneNumber").offset().top}, 500);
  }
  toastr.options = {"closeButton": true, "debug": false, "newestOnTop": false, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": false, "onclick": null, "showDuration": "300", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"}
});
</script>

<script>
  var firstseat = 1;
  var firstseatid = 1;
  $(document).ready(function() {
  	var book_price;
		if( !$('#nationality').val()) { 
			 book_price = <?php echo $vehicle_schedule_data->foreigner_price ?>;
		};
		$('#nationality').on('change', function() {
		  	if( this.value == "Cambodian" ) {
				book_price = <?php echo $vehicle_schedule_data->local_price ?>;
				$("#local_price").val(<?php echo $vehicle_schedule_data->local_price ?>);
				$("#unit_price").text('$ <?php echo $vehicle_schedule_data->local_price ?>');
				$('#subtotal').text("$ " + (sc.find('selected').length * book_price).toFixed(2));
				$('#lblTotalPrice').text("$ " + (sc.find('selected').length * book_price).toFixed(2));
			} else {
				book_price = <?php echo $vehicle_schedule_data->foreigner_price ?>;
				$("#local_price").val(<?php echo $vehicle_schedule_data->foreigner_price ?>);
				$("#unit_price").text('$ <?php echo $vehicle_schedule_data->foreigner_price ?>');
				$('#subtotal').text("$ " + (sc.find('selected').length* book_price).toFixed(2));
				$('#lblTotalPrice').text("$ " + (sc.find('selected').length* book_price).toFixed(2));	
			}
		});
    var $cart = $('#selected-seats'),
    $counter = $('#counter'),
    $subtotal = $('#subtotal'),
    $total = $('#lblTotalPrice'),
    
    sc = $('#seat-map').seatCharts({
      map: [
      <?php echo $vehicle_schedule_data->seats_map ?>
      ],
      naming :{
        columns: [ <?php echo $vehicle_schedule_data->columns ?> ],
        top : false,
        getId  : function(character, row, column) {
          return column+row;
        },
        getLabel : function (character, row, column) {
          return column+row;
        }
      },
      legend : {
        node : $('#legend'),
        items : [
        [ 'a', 'available',   'Available' ],
        [ 's', 'selected',   'Selected'],
        [ 'u', 'unavailable', 'Already Booked']
        ]         
      },
      	click: function () {
			if (this.status() == 'selected') {
				$counter.val(sc.find('selected').length-1);
				$subtotal.text("$ " + (recalculateTotal(sc)- book_price ).toFixed(2));
				$total.text("$ " + (recalculateTotal(sc)- book_price ).toFixed(2));
				$('#cart-item-'+this.settings.id).remove();
				$('#lblPassenger').text(sc.find('selected').length-1);
				return 'available';
			} else if (this.status() == 'available') {
				$('<li><a href="#remove" class="cancel-cart-item">'+this.settings.label+'</a></li>')
				.attr('id', 'cart-item-'+this.settings.id)
				.data('seatId', this.settings.id)
				.appendTo($cart);
				$counter.val(sc.find('selected').length+1);
				$('#lblPassenger').text(sc.find('selected').length+1);
				$subtotal.text("$ " + (recalculateTotal(sc)+ book_price).toFixed(2));
				$total.text("$ " + (recalculateTotal(sc)+ book_price).toFixed(2));
				return 'selected';
			} else if (this.status() == 'unavailable') {
				return 'unavailable';
			} else {
				return this.style();
			}
		},

    });
    
    $('#selected-seats').on('click', '.cancel-cart-item', function () {
      sc.get($(this).parents('li:first').data('seatId')).click();
    });
    sc.get([<?php foreach($seats_booked as $row): echo "'".$row['seat_number']."',"; endforeach ?>]).status('unavailable');

    function recalculateTotal(sc) {
      var total = 0;
      sc.find('selected').each(function () {
        total += book_price;
      });
      return total;
    }
  });

</script>


<script type="text/javascript">
  $("#sub_seat_booking").click(function(event) {
    var phrases = [];
    $('#selected-seats').each(function(){
      var phrase = '';
      $(this).find('li > a').each(function(){
        var current = $(this);
        if(current.children().size() > 0) {return true;}
        phrase += $(this).text()+",";
      });
      phrases.push(phrase);
    });
    $("#booking_seat_array").val(phrases);
  });
  $(function() {
    $('#toggle-event').change(function() {
      $('.pickup_form').slideToggle(300);
    })
  });
  $(function() {
    $("[name=how_to_contact]").click(function(){
      $('.fieldhidden').hide();
      $("#fieldhidden-"+$(this).val()).slideToggle(300);;
    });
  });
</script>