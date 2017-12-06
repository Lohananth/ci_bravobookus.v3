<?php
  if ('POST' === $_SERVER['REQUEST_METHOD']) { 
		$to        = "info@i1booking.com";
		$owner	   = "i1Booking";
		$fullname  = $_POST['name'];  
		$email      = $_POST['email'];
		$title     = $_POST['title']; 
		$message   = $_POST['message'];
		
		$subject  = 'Contact from - '.$fullname;
		$headers  = "MIME-Version: 1.0\r\n";  
		$headers .= "Content-Type: text/html; charset=ISO-8859-8-1\r\n"; 
		$headers .= "From: ".$email."\r\n";   
		$headers .= "\r\n"; 
		
		$subject1 = 'Auto send from '.$owner;
		$headers1  = "MIME-Version: 1.0\r\n";  
		$headers1 .= "Content-Type: text/html; charset=ISO-8859-8-1\r\n";  
		$headers1 .= "From:".$to."\r\n";  
		$headers1 .= "\r\n";
				
		
		$data_info = '<html><body>';
		$data_info .='
					<div style="border:solid 1px #67A4D5; padding:10px;">
					 	<strong> Name: </strong>'.$fullname .' <br/>
					 	<strong> Subject: </strong>'.$title .' <br/>
					 	<strong> Email: </strong>'.$email .' <br/>
					 	<strong> Message: </strong>'.$message .'
					</div>
					';
		$data_info .= '</body></html>';

		$mail_header = " 
			<div>
				<div style='padding:10px; background: #0072C6;'>
					<a href='http://www.i1booking.com/' target='_blank'><img src='http://i1booking.com/images/asset/logo2.png' alt='i1Booking'/></a>
					<h3 style='color:#FFF'>Plan and <span style='color:#0098E5; font-weight:bold;'>Book</span> Your Perfect Trip</h3>
				</div>
			</div>
			<br/>
			Dear&nbsp; <strong>$fullname,</strong> <br/>
			You have successfully submitted your contact information to <strong>$owner.</strong> <br/>
			Below is the information you submitted to us:<br/><br/>
		";

		$signature = "
			<div style='width:100%;text-align:center;background: #D4E2ED;padding: 20px 0;border-top: solid 5px #67A4D5;'>
			<h3>ASIA VCU</h4> <br/>
			<p>
				<a href='http://i1booking.com/' target='_blank'>HOME</a> /
				<a href='http://i1booking.com/bus-operator.php' target='_blank'>BUS TICKET</a> /
				<a href='http://i1booking.com/flights.php' target='_blank'>FLIGHTS</a> /
				<a href='http://i1booking.com/tours-packages.php' target='_blank'>TOURS</a> /
				<a href='http://i1booking.com/accommodation.php' target='_blank'>ACCOMMODATION</a> /
				<a href='http://i1booking.com/contact.php' target='_blank'>CONTACT</a>
			</p>
			<P>
				Mobile: <a href='callto:+85517268000'>+855 17 268 000</a> / <a href='callto:+85570877727'>+855 70 87 77 27</a> <br/>
				E-mail: <a href='mailto:info@i1booking.com'>info@i1booking.com</a><br/>
				website: <a href='http://www.i1booking.com' target='_blank'>www.i1booking.com</a> <br/>
			</P>
			<div>
				<a href='https://www.facebook.com/'  target='_blank'><img src='http://i1booking.com/images/socicon/facebook.png' alt='facebook'></a>
				<a href='#https://www.facebook.com/' target='_blank'><img src='http://i1booking.com/images/socicon/twitter.png' alt='twitter'></a>
				<a href='#https://www.facebook.com/' target='_blank'><img src='http://i1booking.com/images/socicon/googleplus.png' alt='google plus'></a>
				<a href='#https://www.facebook.com/' target='_blank'><img src='http://i1booking.com/images/socicon/youtube.png' alt='youtube'></a>
				<a href='#https://www.facebook.com/' target='_blank'><img src='http://i1booking.com/images/socicon/tripadvisor.png' alt='TripAdvisor'></a>
			</div>
			</div>
		";
		$feedback = "
			$mail_header
			$data_info
			$signature
		";
		
		mail($to, $subject, $data_info, $headers);
		mail($email, $subject1, $feedback, $headers1);
	} 
?>