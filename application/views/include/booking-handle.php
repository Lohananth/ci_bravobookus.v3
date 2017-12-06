<?php
  if ('POST' === $_SERVER['REQUEST_METHOD']) { 
		$to        = "info@i1booking.com, seavichet@live.com";
		$owner	   = "Daily Booking";
		$title     = $_POST['title'];  
		$f_name    = $_POST['first_name'];
		$l_name    = $_POST['last_name']; 
		$email     = $_POST['email'];
		$phone	   = $_POST['phone'];
		$country   = $_POST['country'];
		
		$check_in  = $_POST['checkin'];
		$check_out = $_POST['checkout'];
		$no_room   = $_POST['no_room'];
		$hotel 	   = $_POST['hotel'];
		$roomType  = $_POST['roomType'];
		$children  = $_POST['children'];
		$adults    = $_POST['adults'];
		$more_re   = $_POST['m_r'];	
		$fullname  =$title.' '.$f_name.' '.$l_name;	
		
		$subject  = 'Booking from - '.$fullname;
		$headers  = "MIME-Version: 1.0\r\n";  
		$headers .= "Content-Type: text/html; charset=ISO-8859-8-1\r\n";
		$headers .= "To:info@i1booking.com\r\n";  
		$headers .= "From: ".$email."\r\n";   
		$headers .= "\r\n"; 
		
		$subject1 = 'Auto send from '.$owner;
		$headers1  = "MIME-Version: 1.0\r\n";  
		$headers1 .= "Content-Type: text/html; charset=ISO-8859-8-1\r\n";  
		$headers1 .= "From: ".$to."\r\n";  
		$headers1 .= "\r\n";
				
		
		$data_info = '<html><body>';
		$data_info .='
					<div style="border:solid 1px #67A4D5;">
					 <table width="100%" border="0" cellpadding="5">
						  <tr>
							<td colspan="2" bgcolor="#75C1E4">Persional Infomation</td>
						  </tr>
						  <tr>
							<td width="30%" bgcolor="#E7E7E7"><strong>Full Name:</strong></td>
							<td width="70%" bgcolor="#E7E7E7">' .$fullname. '</td>
						  </tr>
						  <tr>
							<td bgcolor="#D7D7D7"><strong>Email:</strong></td>
							<td bgcolor="#D7D7D7">'.$email.'</td>
						  </tr>
						  <tr>
							<td width="30%" bgcolor="#E7E7E7"><strong>Phone Number:</strong></td>
							<td width="70%" bgcolor="#E7E7E7"> <a href="callto:'.$phone.'">' .$phone. '</a></td>
						  </tr>
						  <tr>
							<td bgcolor="#D7D7D7"><strong>Country:</strong></td>
							<td bgcolor="#D7D7D7">' .$country.'</td>
						  </tr>
						  <tr>
							<td colspan="2"> &nbsp; </td>
						  </tr>
						  <tr>
							<td colspan="2" bgcolor="#75C1E4">Booking Infomation</td>
						  </tr>
						  <tr>
							<td bgcolor="#E7E7E7"><strong>Check In:</strong></td>
							<td bgcolor="#E7E7E7">' .$check_in. '</td>
						  </tr>
						  <tr>
							<td bgcolor="#D7D7D7"><strong>Check Out:</strong></td>
							<td bgcolor="#D7D7D7">' .$check_out. '</td>
						  </tr>
						  <tr>
							<td bgcolor="#E7E7E7"><strong>Hotel name:</strong></td>
							<td bgcolor="#E7E7E7">' .$hotel. '</td>
						  </tr>
						  <tr>
							<td bgcolor="#D7D7D7"><strong>No / Room Type:</strong></td>
							<td bgcolor="#D7D7D7">'.$no_room. ' / '. $roomType. '</td>
						  </tr>
						  <tr>
							<td bgcolor="#E7E7E7"><strong>Number of Person:</strong></td>
							<td bgcolor="#E7E7E7">Adults: ' .$adults.' - Childrent: '.$children.'</td>
						  </tr>
						  <tr>
							<td bgcolor="#D7D7D7"><strong>Request :</strong></td>
							<td bgcolor="#D7D7D7">' .$more_re. '</td>
						  </tr>
					</table>
					</div>
					';
		$data_info .= '</body></html>';

		$mail_header = " 
			<div>
				<div style='padding:10px; background: #0072C6;'>
					<a href='http://www.Please printing out this ticket. <br>
1- The passenger should arrive to bus terminal 15 minutes before departure time.<br>
2- Company wouldn't response for any of client who come late and ticket will he expire.<br>
3- Ticket bought is non-refundable.<br>
4- Over 6 years old child must buy ticket.<br>
5- Passenger should buy ticket one day before advance.<br>
6- Passenger are allowed to carry maximum 30 kg luggage will be extra charge is over.<br>
7- Pets, arms, addicted drugs, smuggling products, and other dangerous material are not allowed to bring into the bus.<br>
8- The company is not responsible for any lose of valued property such as gold, diamond, etc./' target='_blank'><img src='http://i1booking.com/images/logo2.png' alt='Daily Booking Logo'/></a>
					<h3 style='color:#FFF'>Plan and <span style='color:#0098E5; font-weight:bold;'>Book</span> Your Perfect Trip</h3>
				</div>
			</div>
			<br/>
			Dear&nbsp; <strong>$fullname,</strong> <br/>
			You have successfully submitted your booking information to <strong>$owner.</strong> <br/>
			Below is the information you submitted to us:<br/><br/>
		";

		$signature = "
			<div style='width:100%;text-align:center;background: #D4E2ED;padding: 20px 0;border-top: solid 5px #67A4D5;'>
			<h3>DAILY BOOKING</h4> <br/>
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