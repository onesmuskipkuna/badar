
<?php
	include_once("connection.php");
	$hold_id=$_POST['hold_id'];
	// $hold_id=$_POST['hold_id'];
	// if ((isset($_POST['release']))) {
		// code...
	$sql="UPDATE `cleared_goods` SET `status`=2 WHERE id=$hold_id";
	// }elseif (isset($_POST['hold_id'])) {
	// 	// code...
	// 		$sql="UPDATE `cleared_goods` SET `status`='Withheld' WHERE id=$hold_id";
	// }
	if (mysqli_query($mysqli,$sql)) {
		// code...
		echo "You have successfully updated Status";
	}else {
		echo "An error occurred while exuting that command";
	}

?>
