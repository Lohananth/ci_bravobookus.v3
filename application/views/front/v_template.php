<!DOCTYPE html>
<html lang="en">
<head>

<?php include_once('inc/head_script.php'); ?>
<link rel="shortcut icon" href="<?php echo base_url() ?>public/img/favicon.ico" type="image/x-icon">
<!-- DateTime -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

 <!-- Main Style -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>front/assets/css/main-style.css">
<!-- Bus -->
<script type="text/javascript">
  $(document).ready(function () {
    <?php 
      echo "directions=".$origins;
    ?>    
  
   for (var i = 0; i < directions.length; i++)
    {
        // directions[i].value = directions[i].firstName + " " + directions[i].lastName + " " + directions[i].origin;
    
        // $img='<img src="'+ directions[i].imgUrl +'"/>';
        // if(directions[i].origin !="Batman"){
            directions[i].value = directions[i].origin  ;
            $direct_id=directions[i].id ;
        // }
        // alert($direct_id);
        
    }    
      $("#txtBusOrigin").autocomplete({
        source: directions,
        // minLength: 0,
        minLength: 0,
        focus: function (event, ui) {
            $("#txtBusOrigin").val(ui.item.origin) 
            
            return false;
        },
        select: function (event, ui) {
            // location.href = ui.item.imgUrl;
            // return false;

            
            $('#txtBusDestination').focus();
            var id=ui.item.id;            
             $('#bus_from').val(id);
            // alert(ui.item.id);
        },
    }).bind('focus', function(){ $(this).autocomplete("search");} )
    .autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");

        var BusDestination=$('#txtBusDestination').val(); //Get Value from Destination
        if(item.origin !=BusDestination){    // Selected Item destination not show          
        $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        // $imageDiv = $("<div>");
        // $imageDiv.addClass("contactImageDiv");
        // $imageDiv.appendTo($outerDiv);

        // $img = $("<img>");
        // $img.addClass("contactImage");
        // $img.attr("src", item.imgUrl);
        // $img.appendTo($imageDiv);
        
        $name = $("<div>");
        $name.addClass("nameDiv");
        // $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.origin + "</span>");
        $name.append(item.origin + "<br><span class='fa fa-map-marker' style='color:green;font-style:italic; font-size:12px; padding-top:30xp;'>"+ " " + item.country + "</span>");
        $name.appendTo($outerDiv);        
        }     

        $li.appendTo(ul);
        
        return  $li;
    };


    // Destinations
    $("#txtBusDestination").autocomplete({
        source: directions,
        minLength: 0,
        focus: function (event, ui) {
            $("#txtBusDestination").val(ui.item.origin)

            return false;
        },
        select: function (event, ui) {
            // location.href = ui.item.imgUrl;
            // return false;
             $('#txtBusDate').focus() //set forcus to Date

              var id=ui.item.id;            
             $('#bus_to').val(id);
        },
    }).bind('focus', function(){ $(this).autocomplete("search"); } )
    .autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");
        var BusOrigin=$('#txtBusOrigin').val(); //Get Value from Destination
        if(item.origin !=BusOrigin){    // Selected Item destination not show 
            $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        // $imageDiv = $("<div>");
        // $imageDiv.addClass("contactImageDiv");
        // $imageDiv.appendTo($outerDiv);

        // $img = $("<img>");
        // $img.addClass("contactImage");
        // $img.attr("src", item.imgUrl);
        // $img.appendTo($imageDiv);

        $name = $("<div>");
        $name.addClass("nameDiv");
        // $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.origin + "</span>");
        $name.append(item.origin + "<br><span style='color:green;font-style:italic; font-size:12px; padding-top:30xp;'>" + item.country + "</span>");
        
        $name.appendTo($outerDiv);
        }
        
        $li.appendTo(ul);
        return $li;
    };    
})
</script>
<!-- // Bus -->
<!-- Private Taxies -->
<script type="text/javascript">
  $(document).ready(function () {
    <?php 
      echo "directions=".$origins;
    ?>    
  
   for (var i = 0; i < directions.length; i++)
    {
        // directions[i].value = directions[i].firstName + " " + directions[i].lastName + " " + directions[i].origin;
    
        // $img='<img src="'+ directions[i].imgUrl +'"/>';
        // if(directions[i].origin !="Batman"){
            directions[i].value = directions[i].origin ;
            // directions[i].value=directions[i].id;
        // }
        // alert(directions[i].value);
        
    }    
      $("#txtPrivateTaxiOrigin").autocomplete({
        source: directions,
        // minLength: 0,
        minLength: 0,
        focus: function (event, ui) {
            $("#txtPrivateTaxiOrigin").val(ui.item.origin) 
            // $("#bus_from").val(ui.item.id)

            return false;
        },
        select: function (event, ui) {
            // location.href = ui.item.imgUrl;
            // return false;
            
            $('#txtPrivateTaxiDestination').focus() 
        },
    }).bind('focus', function(){ $(this).autocomplete("search");} )
    .autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");

        var BusDestination=$('#txtPrivateTaxiDestination').val(); //Get Value from Destination
        if(item.origin !=BusDestination){    // Selected Item destination not show          
        $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        // $imageDiv = $("<div>");
        // $imageDiv.addClass("contactImageDiv");
        // $imageDiv.appendTo($outerDiv);

        // $img = $("<img>");
        // $img.addClass("contactImage");
        // $img.attr("src", item.imgUrl);
        // $img.appendTo($imageDiv);
        
        $name = $("<div>");
        $name.addClass("nameDiv");
        // $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.origin + "</span>");
        $name.append(item.origin + "<br><span class='fa fa-map-marker' style='color:green;font-style:italic; font-size:12px; padding-top:30xp;'>"+ " " + item.country + "</span>");
        $name.appendTo($outerDiv);        
        }     

        $li.appendTo(ul);
        
        return  $li;
    };


    // Destinations
    $("#txtPrivateTaxiDestination").autocomplete({
        source: directions,
        minLength: 0,
        focus: function (event, ui) {
            $("#txtPrivateTaxiDestination").val(ui.item.origin)
            $("#bus_to").val(ui.item.id)

            return false;
        },
        select: function (event, ui) {
            // location.href = ui.item.imgUrl;
            // return false;
             $('#txtPrivateTaxiDate').focus() //set forcus to Date
        },
    }).bind('focus', function(){ $(this).autocomplete("search"); } )
    .autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");
        var BusOrigin=$('#txtPrivateTaxiOrigin').val(); //Get Value from Destination
        if(item.origin !=BusOrigin){    // Selected Item destination not show 
            $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        // $imageDiv = $("<div>");
        // $imageDiv.addClass("contactImageDiv");
        // $imageDiv.appendTo($outerDiv);

        // $img = $("<img>");
        // $img.addClass("contactImage");
        // $img.attr("src", item.imgUrl);
        // $img.appendTo($imageDiv);

        $name = $("<div>");
        $name.addClass("nameDiv");
        // $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.origin + "</span>");
        $name.append(item.origin + "<br><span style='color:green;font-style:italic; font-size:12px; padding-top:30xp;'>" + item.country + "</span>");
        
        $name.appendTo($outerDiv);
        }
        
        $li.appendTo(ul);
        return $li;
    };    
})
</script>
<!-- // Private taxies -->


</head>
<body>
 
<!-- Nav -->
<?php include_once('inc/nav.php'); ?>
<!-- End Nav -->
<div class="container"> 
<!-- Login Form -->
<?php 
  include_once('inc/login.php');
?>

<!-- End Login Form -->

<!-- Sign Up Form -->
<?php 
  include_once('inc/signup.php');
?>

<!-- End Sign Up Form -->



     <?php     
    include_once('inc/search.php');
     ?>
</div>
 


<div class="container">
<div class="row">
 <div class="col-sm-8" style="margin-top: 20px;">
  
    <img src="<?php echo base_url(); ?>front/images/standard_bookmebus-home-page-cover-limited.png" alt="Norway" style="width:100%;">
    
  </div>

<div class="col-sm-4" style="color: black;text-align: left; margin-top: 20px;">
        <section class="links tips">
          <h3 class="section-heading text-highlight"><span class="line">Why buy tickets with us?</span></h3>
          <div class="section-content">
            <p><i class="fa fa-check-circle"></i> Guaranteed price</p>
            <p><i class="fa fa-check-circle"></i> From authorized operators only</p>
            <p><i class="fa fa-check-circle"></i> E-Ticket &amp; M-Ticket support</p>
            <p><i class="fa fa-check-circle"></i> Reschedule</p>
            <p><i class="fa fa-check-circle"></i> Book &amp; Save points for rewards</p>
            <p><i class="fa fa-check-circle"></i> Review &amp; Rate bus operators</p>
            <p><i class="fa fa-check-circle"></i> VISA Card, Master Card &amp; JCB acceptance</p>
          </div><!--//section-content-->
        </section><!--//links-->
</div>
</div>
</div>
<!--  Main Rood -->
<div class="container">
  <hr>
  <?php
  include_once('inc/main_road.php');
  ?>
</div>
<!-- End main Road -->


<div class="container text-center">    
  <div style="background-color: #010B50; color:white; padding:2px; width: 190px; height: 39px; font-size: 22px;"><i class="fa fa-users" aria-hidden="true"></i>
    Our Partners     
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








<!-- Recent News -->
<?php 
  include_once("inc/news.php");
?>
<!-- End Recent News -->

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
      <div class="col-md-3 col-sm-6" >
        <!--Column1-->
        <div class="footer-pad">
          <h4>Popular Services</h4>
          <ul class="list-unstyled" >
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



  <script>
function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<!-- Script Slide -->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>



<script type="text/javascript">
  // Switch Option
    $('#btnBusSwap').on('click',function (){
        // var id=$(this).attr('datasearch');
        var dd =$('#txtBusOrigin').val();
        var to=$('#txtBusDestination').val();
        var tmp='';
        //alert(dd);
        tmp=to;
        $('#txtBusDestination').val($('#txtBusOrigin').val());
        $('#txtBusOrigin').val(tmp);
  });

  $('#btnBusRemoveOrigin').on('click',function(){
    var emp='';
    $('#txtBusOrigin').val(emp);
    // alert("Remove");
  });

   $('#btnBusRemoveDestination').on('click',function(){
    var emp='';
    $('#txtBusDestination').val(emp);
    // alert("Remove");
  });


</script>


<!-- Date Time -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      // format: 'dd/mm/yyyy',
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  });

    $(document).ready(function(){
    var date_input=$('input[name="txtBusDate"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";


    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
      startDate: truncateDate(new Date()) // <-- THIS WORKS
    })

    $('#date').datepicker('setStartDate', truncateDate(new Date())); // <-- SO DOES THIS


  });

   

    // Icon click
    $('#btnBusShowCalendar').on('click',function(){ 
      $('#txtBusDate').focus()  
       
    });


    // `Private Taxi Date
   $(document).ready(function(){
    var date_input_PrivateTaxiDate=$('input[name="txtPrivateTaxiDate"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input_PrivateTaxiDate.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
      startDate: truncateDate(new Date()) // <-- THIS WORKS
    })

    $('#txtPrivateTaxiDate').datepicker({
      format: "yyyy-mm-dd"
    }).on('change', function(){
        $('.datepicker').hide();
    });

    $('#txtPrivateTaxiDate').datepicker('setStartDate', truncateDate(new Date())); // <-- SO DOES THIS
  });

   

    // txtPrivateTaxiDate Icon Click
    $('#btnPrivateTaxiShowCalendar').on('click',function(){ 
          $('#txtPrivateTaxiDate').focus()    
      });

function truncateDate(date) {
  return new Date(date.getFullYear(), date.getMonth(), date.getDate());
}

</script>

<script src="<?php echo base_url(); ?>front/assets/search/js/jquery-ui.min.js"></script>

  
<script>

// Carousel Auto-Cycle
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });



// News
$(document).ready(function(ev){
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

</script>


<!-- Popup Form -->
<script>
// Get the modal
var modal = document.getElementById('myLogin');

// Get the button that opens the modal
var btn = document.getElementById("myLogin");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!-- End Popup Form -->

</body>
</html>
