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
        <li <?php if($this->uri->segment(1)==""){echo 'class="active"';}?>>
        	<a href="<?php echo site_url(); ?>">
        		<i class="fa fa-home" aria-hidden="true"></i> 
        		<?php echo $this->lang->line('menu_home'); ?></a>
    	</li>
<li <?php if($this->uri->segment(1)=="about.html"){echo 'class="active"';}?>><a href="<?php echo site_url(); ?>about.html"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $this->lang->line('menu_about'); ?></a></li>
                
        <li <?php if($this->uri->segment(1)=="services.html"){echo 'class="active"';}?>><a href="<?php echo site_url(); ?>services.html"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $this->lang->line('menu_services'); ?></a></li>
         <li <?php if($this->uri->segment(1)=="contact.html"){echo 'class="active"';}?>><a href="<?php echo site_url(); ?>contact.html"><?php echo $this->lang->line('menu_contact'); ?></a></li>
        <li><a href="<?php echo site_url(); ?>#"><?php echo $this->lang->line('menu_forums'); ?></a>
        	

        </li>
      </ul>
      <div class="dropdown">
		<ul class="dropdown-menu"> LANG
			    <li>
			    	<a  href="<?php echo site_url();?>#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
			    </li>
			     <li>
			     	<a href="<?php echo site_url();?>#"><i class="fa fa-user-plus" aria-hidden="true"></i>  Register</a>
			     </li>

		</ul>
      </div>
      <ul class="nav navbar-nav navbar-right">      
	     <div class="dropdown">
			  <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" style="padding-top:0px; padding-bottom: 0px;">
			  	<div class="chip">			        
			          <user>LANG</user>
			    </div> 
			  <span class="caret"></span></button>
			  <ul class="dropdown-menu">
			    <li>
			    	<a  href="<?php echo site_url(); ?>/LanguageSwitcher/switchLang/khmer">Khmer</a>
			    </li>
			     <li>
			     	<a href="<?php echo site_url(); ?>/LanguageSwitcher/switchLang/english">English</a>
			     </li>
			     <li>
			     	<a href="<?php echo site_url(); ?>/LanguageSwitcher/switchLang/french">French</a>
			     </li>
			  </ul>
			</div>
       
  
         

      </ul>


      
      <ul class="nav navbar-nav navbar-right">      
	     <div class="dropdown">
			  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="padding-top:0px; padding-bottom: 0px;"><div class="chip">

			        <img src="<?php echo base_url(); ?>front/images/logo1.jpg" alt="Person" width="96" height="96">
			          <user> John Doe</user>
			      </div> 
			  <span class="caret"></span></button>
			  <ul class="dropdown-menu">
			    <li>
			    	<a  href="<?php echo site_url();?>#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
			    </li>
			     <li>
			     	<a href="<?php echo site_url();?>#"><i class="fa fa-user-plus" aria-hidden="true"></i>  Register</a>
			     </li>

			  </ul>



			</div>
       
       <!--  <li><a  href="#" data-toggle="modal" data-target="#myLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <li><a href="#" data-toggle="modal" data-target="#mySignup"><i class="fa fa-user-plus" aria-hidden="true"></i>  Register</a></li> -->
          
         

      </ul>
      
    </div>
    
  </div>
</nav>