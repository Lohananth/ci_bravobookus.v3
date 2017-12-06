
<?php
	include_once '../daily-booking/class/config.php';
	$DBhost = SERVER_NAME1;
	$DBuser = USER_NAME1;
	$DBpass = PASSWORD1;
	$DBname = DB1;
	$con = mysqli_connect(SERVER_NAME1,USER_NAME1,PASSWORD1,DB1);
	try {
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
	} catch(PDOException $ex){
		die($ex->getMessage());
	}
?>
<?php
if (isset($_REQUEST['map'])) {
		$map = intval($_REQUEST['map']);
		$comid = intval($_REQUEST['comid']); 
		$query = "SELECT address, map, branch_name FROM tbl_branch WHERE company_id=:comid AND location=:map";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':comid'=>$comid, ':map'=>$map));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>
		<p> <strong><?php echo $branch_name ?> </strong>Address: <?php echo $address ?></p>
		<?php echo $map ?>
			
<?php				
	}
	
?>

			