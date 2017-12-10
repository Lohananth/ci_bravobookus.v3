<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<link rel="shortcut icon" href="<?php echo base_url() ?>public/img/favicon.ico" type="image/x-icon">
		<meta charset="UTF-8">
		<meta name="keywords" content="BravoBookUs Admin" />
		<meta name="description" content="BravoBookUs Admin">
		<meta name="author" content="okler.net">	
		 <base href="<?php echo base_url(); ?>public/admin/">
		<?php 
		if(isset($head_login)){
			$this->load->view($head_login);
		}
		?>

	</head>
	<body>
		<!-- start: page -->
		<?php $this->load->view($main_content); ?>
		<!-- end: page -->
		<?php 
		if(isset($footer)){
			$this->load->view($footer);
		}
		?>
	</body>
</html>