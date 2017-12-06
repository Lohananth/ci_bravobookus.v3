<button class="tablink " onclick="openCity('Buses', this, '#2874A6')" id="defaultOpen"><i class="fa fa-bus" aria-hidden="true"></i> Buses</button>
<button class="tablink" onclick="openCity('PrivateTaxi', this, 'green')"><i class="fa fa-taxi" aria-hidden="true"></i> Taxi</button>
<button class="tablink" onclick="openCity('Hotels', this, 'blue')"><i class="fa fa-bed" aria-hidden="true"></i> Hotels</button>
<!-- <button class="tablink" onclick="openCity('Oslo', this, 'orange')">Oslo</button> -->

<div id="Buses" class="tabcontent">
  
<?php include_once('search_bus.php'); ?>

</div>

<div id="PrivateTaxi" class="tabcontent">
<?php include_once('search_PrivateTaxi.php'); ?>
</div>

<div id="Hotels" class="tabcontent">
<!-- Hotels -->
<?php include_once('search_Hotels.php'); ?>
</div>

<!-- <div id="Oslo" class="tabcontent">
  <h3>Oslo</h3>
  <p>Oslo is the capital of Norway.</p>
</div> -->



     