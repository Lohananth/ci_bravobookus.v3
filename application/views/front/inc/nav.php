<nav class="navbar navbar-inverse" style="border-radius: 0px; background-color: #010B50;">
  <!-- <div class="container-fluid"> -->
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo site_url(); ?>"><img style="height: 32px;" src="<?php echo base_url(); ?>front/images/logo-banner.png" alt="BravoBookus.com"></a>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url(); ?>#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <li><a href="<?php echo site_url(); ?>#"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a></li>
        <li><a href="<?php echo site_url(); ?>#"><i class="fa fa-users" aria-hidden="true"></i> Customers Serivces</a></li>
         <li><a href="<?php echo site_url(); ?>#">Forums</a></li>
        <li><a href="<?php echo site_url(); ?>#">Contact</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">      
      <div class="chip">

        <img src="<?php echo base_url(); ?>front/images/logo1.jpg" alt="Person" width="96" height="96">
          <user> John Doe</user>
      </div> 
       
        <li><a  href="#" data-toggle="modal" data-target="#myLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <li><a href="#" data-toggle="modal" data-target="#mySignup"><i class="fa fa-user-plus" aria-hidden="true"></i>  Register</a></li>
      </ul>
    </div>
  </div>
</nav>