<?php ob_start(); ?>
<?php SESSION_START(); ?>
<?php date_default_timezone_set('Asia/Phnom_Penh'); ?>
<?php
include_once("../daily-booking/class/config.php");
include_once("../daily-booking/class/class-database.php");
include_once("../daily-booking/class/class-control.php");
include_once("../daily-booking/class/ticket.php");

$ticket = new Ticket; $ticket->conn();
$booking_code = $ticket->getLastBookingCode() + 1;
$ticket->closeConnection();

?>
<?php
  $to             = "ticket@i1booking.com, i1bookbus@gmail.com";
  $owner          = "i1Booking";
  $title          = $_POST['title'];  
  $f_name         = $_POST['f_name']; 
  $nationality    = $_POST['nationality'];
  $email          = $_POST['email'];
  $phoneNumber    = $_POST['output_phone']; 
  $country    	  = $_POST['country_txt']; 
  $c_id         = $_POST['c_id'];
  $origin         = $_POST['origin'];
  $destination      = $_POST['destination'];
  $departure_date     = $_POST['departure_date'];
  $departure_time     = $_POST['departure_time'];
  $v_type         = $_POST['v_type'];
  $booking_seat_array = rtrim($_POST['booking_seat_array'],",");
  $txtTotalSeats    = $_POST['txtTotalSeats'];
  $operator       = $_POST['operator'];
  $local_price      = $_POST['local_price']; 
  $vsid         = $_POST['vsid'];
  $pickup = "Location name:".$_POST['accommodation_name'] . "<br/>" . "Address:" . $_POST['full_address'];
  $total_seats = explode(',', $booking_seat_array);
  $total_price = ($local_price * count($total_seats));

$db = new Database1();
$sql = "
SELECT
	count(id) AS booking_seat
FROM
	tbl_ticket
WHERE
	(
		departure_date = '{$departure_date}'
		AND vs_id = {$vsid}
	)
AND seat_number IN ({$allseats})
";

$res = $db->con->query($sql);
$count_ticket = 0;
if($res){
	$booking_ticket = $res->fetch_array();
	$count_ticket = $booking_ticket['booking_seat'];
}
if(intval($count_ticket)>0){
	header("Location: https://www.i1booking.com/booking-seat.php?vsid={$vsid}&dep={$departure_date}&msg=1"); 
}else{
	
	  $ticket = new Ticket; $ticket->conn();
	  $ticket->booking_code = $booking_code;
	  $ticket->vs_id = $vsid;
	  $ticket->u_id = 0;
	  $ticket->c_id = $c_id;
	  $ticket->booking_date = date('Y-m-d');
	  $ticket->booking_time = date('H:i');
	  $ticket->seat_number = $booking_seat_array;
	  $ticket->title = $title;
	  $ticket->passenger_name = $f_name;
	  $ticket->email = $email;
	  $ticket->phone = $phoneNumber ." (".$country.")";
	  $ticket->nationality = $nationality;
	  $ticket->price = floatval($total_price);
	  $ticket->status = "Pending";
	  $ticket->departure_date = $departure_date;
	  $ticket->pickup = $pickup;
	  $ticket->save();
	  $ticket->closeConnection();

	$_SESSION['booking_code'] = $booking_code;
}
?>
<?php 
	if(isset($_SESSION["booking_code"])){
		header('Location: /payment-gateway.php'); 
	}	
?>