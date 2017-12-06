<?php include_once("../functions.php") ?>
<?php 
   $item = trim(Decrypt('mykey', $_POST["item"]));
   $amount_text = trim(Decrypt('mykey', $_POST["amount"]));
   $amount =  $amount_text - $amount_text*10/100;
   $passenger_name = trim(Decrypt('mykey', $_POST["passenger_name"]));
	$param = array(
		'loginId'=>'online.mkh',
		'password' =>'d1aae47f05b2fa8c9edc922c488f1613',
		'item'=> $item,
		'amount'=>$amount,
                'order_referenceno'=>$item,
		'merchant_name'=>'VCU ASIA',
		'notify_service'=>'https://www.i1booking.com/include/wing/notify_serice_get_response_back.php',
		'notify_url'=>'https://www.i1booking.com/confirm_booking_seats.php?wingpayment=paid',
		'return_url'=>'https://www.i1booking.com/'
	);
	$url = "https://ketluy.wingmoney.com/wing/authenticate";
	$content = json_encode($param);
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($curl);
	if ($response===FALSE)
	echo"cURL Error: ".curl_error($curl);
	else header("Location:https://ketluy.wingmoney.com/payment?token=$response");
?>
