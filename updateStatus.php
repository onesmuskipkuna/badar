
<?php
	include_once("connection.php");
	$release=$_POST['release'];
	// $hold_id=$_POST['hold_id'];
	// if ((isset($_POST['release']))) {
		// code...
	$sql="UPDATE `cleared_goods` SET `status`=1 WHERE id=$release";
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
