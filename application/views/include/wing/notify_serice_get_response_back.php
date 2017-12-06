<?php session_start(); ?>
<?php
		$data = file_get_contents("php://input");
		$json=json_decode($data,true);
		if ($json['tstatus'] == '200') {
			$tstatus = $json['tstatus'];
			$tid = $json['tid'];
			$account = $json['account'];
			$amount = $json["amount"];
			$currency= $json["currency"];
			$order_referenceno = $json['order_referenceno'];
			$token = $json['token'];
			$items =  $json['items'];
			$message=  'Transaction successful';
            		$_SESSION['item'] = $items; 
            		
            		$con = mysqli_connect("localhost","i1bookin_ticket","ticket123!@#","i1bookin_ticket") or die('Could not connect: ' . mysql_error());
			$sql = "INSERT INTO tbl_wing_tran(code, tid, account, amount, currency, order_referenceno, token, item, message)
			VALUES('$tstatus', '$tid', '$account', '$amount', '$currency', '$order_referenceno', '$token', '$items', '$message')";
                        $res = mysqli_query($con,$sql);
			if(!res)
			{
			    die('Error : ' . mysql_error());
			}
		}elseif ($json['tstatus'] !== '200') {
		
			$tstatus = $json['tstatus'];
			$tid = $json['tid'];
			$account = $json['account'];
			$amount = $json["amount"];
			$currency= $json["currency"];
			$order_referenceno = $json['order_referenceno'];
			$token = $json['token'];
			$items =  $json['items'];
			$message=  $json['message'];
            		$_SESSION['item'] = $items; 
            		
            		$con = mysqli_connect("localhost","i1bookin_ticket","ticket123!@#","i1bookin_ticket") or die('Could not connect: ' . mysql_error());
			$sql = "INSERT INTO tbl_wing_tran(code, tid, account, amount, currency, order_referenceno, token, item, message)
			VALUES('$tstatus', '$tid', '$account', '$amount', '$currency', '$order_referenceno', '$token', '$items', '$message')";
			
                        $res = mysqli_query($con,$sql);
			if(!res)
			{
			    die('Error : ' . mysql_error());
			}
		}else {
			header("Location:https://www.i1booking.com/");
		}
?>