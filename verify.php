
<?php
include('header.php');
include_once("connection.php");

if(isset($_POST['acknowledge']))
{
	$id = $_POST['id'];

	$comments=$_POST['comments'];
	$date_received=$_POST['date'];
	$goods_id=$_SESSION['goods_id'];
	$driver_id=$_SESSION['driver_id'];
	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "INSERT INTO `delivered_goods`(`driver_id`, `customer_id`, `customer_comments`, `goods_id`,`date_received`) VALUES('$driver_id','$id','$comments','$goods_id','$date_received')");
		$_SESSION['verifed']='verified';
		echo '<script type="text/javascript">';
		echo 'alert("You have confirmed recipt successfully!!")';
		echo '</javascript>';
		header("Location: verifyReceivedGoods.php");


	// }
}
?>
<?php
//getting id from url
// $id = $_GET['id'];
// $comments=$_POST['comments'];
// $date_received=$_POST['date'];
// $goods_id=$_SESSION['goods_id'];
// $driver_id=$_SESSION['driver_id'];
// //selecting data associated with this particular id
// $result = mysqli_query($mysqli, "INSERT INTO `delivered_goods`(`driver_id`, `customer_id`, `customer_comments`, `goods_id`) VALUES('$driver_id','$id','$comments','$date_received')");
// if ($result) {
// 	// code...
// }

?>
<div class="container p-3">
	<div class="row p-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
						<h5>Complete Acknowledgement</h5>
				</div>
				<div class="card-body">
					<form action="verify.php" method="post" name="form1">
						<div class="form-group">
							<label for="">Choose The Date You Received </label>
							<input type="date" name="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="">Your Comments</label>
							<textarea type="text" name="comments" class="form-control"  required></textarea>
						</div>

						<div class="form-group">
							<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
							<input type="submit" name="acknowledge" value="Acknowledge Now" class="btn btn-primary btn-block"></td>
							<!-- <input type="submit" name="Submit" class="btn btn-primary btn-block" value="Add Articles"> -->
						</div>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<p>Goods received are subject to the return conditions</p>
				</div>
			</div>

	</div>
		<script type="text/javascript">
					CKEDITOR.replace('comments');
					CKEDITOR.config.fillEmptyBlocks = false;
		</script>

</div>
<?php include('footer.php'); ?>
