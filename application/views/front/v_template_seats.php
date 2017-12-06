<!DOCTYPE html>
<html lang="en">
<head>

<?php  
if($title==""){
$title="Welcome to Bravobookus.com, the best booking trip online";
}

 ?>
<title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <!-- Awsom Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/font-awesome/css/font-awesome.min.css"> 






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


<!-- Seat Map -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/assets/plugins/jsc/seat_styles.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets//css/validate.css">
  <!-- // Seat Map -->
<!-- DateTime -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

 <!-- Main Style -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/main-style.css">


</head>
<body>
<!-- Nav -->
<?php include_once('inc/nav.php'); ?>
<!-- End Nav -->
<div class="container"> 
     <?php     
    //include_once('inc/search.php');
     ?>
</div>
 


<!--  Search Result -->

<div class="container">
  <hr>
  <?php
    include_once('v_select_seat.php');
  ?>
</div>

<!-- End Search Result -->


<div class="container text-center">    
  <div style="background-color: #010B50; color:white; padding:2px; width: 200px; height: 39px; font-size: 22px;"><i class="fa fa-users" aria-hidden="true"></i>
    Our Recomands     
  </div>
    <div style=" border-bottom-style: solid; border-bottom-color:#0219B4; border-width:4px;">
  </div>
  <br>
  <div class="row">
   <?php
   for($i=1;$i<=12;$i++){
   ?>
    <div class="col-sm-2 col-xs-4" style="margin-bottom: 20px;">
          <a href="/en/ekareach-express" data-toggle="tooltip"  title="Company <?php echo $i; ?>!">
         <img id="myImg" class="img-responsive partners-list" style="margin: 0 auto; " alt="" src="<?php echo base_url(); ?>front/images/logo/logo<?php echo $i ; ?>.png">
  </a> 
  </div>
   <?php
 }
   ?>   
  </div></div><br>


<div class="m-t-3"></div>

<footer class="mainfooter" role="contentinfo" style="background-color: #0E6655;color: white;">
 
  <div class="footer-middle" >
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Address</h4>
          <address>
                <ul class="list-unstyled">
                  <li>
                    City Hall<br>
                    212  Street<br>
                    Lawoma<br>
                    735<br>
                  </li>
                  <li>
                    Phone: 0
                  </li>
                </ul>
              </address>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Services</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">Payment Center</a></li>
            <li><a href="#">Contact Directory</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">News and Updates</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Website Information</h4>
          <ul class="list-unstyled">
            <li><a href="#">Website Tutorial</a></li>
            <li><a href="#">Accessibility</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Webmaster</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Departments</h4>
          <ul class="list-unstyled">
            <li><a href="#">Parks and Recreation</a></li>
            <li><a href="#">Public Works</a></li>
            <li><a href="#">Police Department</a></li>
            <li><a href="#">Fire</a></li>
            <li><a href="#">Mayor and City Council</a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>

</footer>
  <div class="footer-bottom" style="background-color: #0B5345; padding-bottom: 15px; padding-top: 15px; color: white;">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <!--Footer Bottom-->
          <p class="text-xs-center">&copy; Copyright 2016 - City of USA.  All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>



 <!-- Seat Map -->
  <script src="<?php echo base_url(); ?>front/assets/plugins/jsc/jquery.seat-charts.js"></script>
  <!-- End Seat Map -->
  
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
       book_price = <?php echo $v['foreigner_price'] ?>;
    };
    $('#nationality').on('change', function() {
        if( this.value == "Cambodian" ) {
        book_price = <?php echo $v['local_price'] ?>;
        $("#local_price").val(<?php echo $v['local_price'] ?>);
        $("#unit_price").text('$ <?php echo $v['local_price'] ?>');
        $('#subtotal').text("$ " + (sc.find('selected').length * book_price).toFixed(2));
        $('#lblTotalPrice').text("$ " + (sc.find('selected').length * book_price).toFixed(2));
      } else {
        book_price = <?php echo $v['foreigner_price'] ?>;
        $("#local_price").val(<?php echo $v['foreigner_price'] ?>);
        $("#unit_price").text('$ <?php echo $v['foreigner_price'] ?>');
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
      <?php echo $v['seats_map'] ?>
      ],
      naming :{
        columns: [ <?php echo $v['columns'] ?> ],
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
    sc.get([<?php for($i=0;$i<count($seat_booked_array);$i++): echo "'".$seat_booked_array[$i]."',"; endfor ?>]).status('unavailable');

    function recalculateTotal(sc) {
      var total = 0;
      sc.find('selected').each(function () {
        total += book_price;
      });
      return total;
    }
  });

</script>
<script>
  function save_booking(){
    var fullname = document.getElementById("f_name").value;
    var title = document.getElementById("title").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("output_phone").value;
    var vsid = document.getElementById("vsid").value;
    var dep = document.getElementById("dep").value;
    var nationality = document.getElementById("nationality").value;
    var count = $("div[aria-checked^='true']").length;
    var arr = $("div[aria-checked^='true']");
    var seats = [];
    for(i=0; i<count; i++){
      seats.push(arr.eq(i).text());
    }
    var dataString = 'fullname='+fullname + '&title='+title + '&seats='+seats + '&email='+email +'&mobile='+mobile + '&vsid='+vsid + '&dep='+dep + '&nationality='+nationality;
    $.ajax({
      type: "POST",
      url: "save_booking.php",
      data: dataString,
      cache: false,
      success: function(result){
        alert('Thanks you for using our services!\nPlease check your email for verify.');
        location.reload();
      }
    });
    return false;
  }
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
</body>
</html>
