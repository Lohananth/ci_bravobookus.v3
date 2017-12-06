<?php
	include_once '../daily-booking/class/config.php';
	$DBhost = SERVER_NAME1;
	$DBuser = USER_NAME1;
	$DBpass = PASSWORD1;
	$DBname = DB1;
	try {
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
	} catch(PDOException $ex){
		die($ex->getMessage());
	}
?>
<?php
if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM tbl_company WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>				
		<div><?php echo $service_detail ?></div>	
<?php				
	}
	
?>

			