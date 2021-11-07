
<?php
// including the database connection file
include('header.php');
include_once("connection.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$conditions =$_POST['conditions'];
	$customer =$_POST['customer'];
	$full_pallets = $_POST['full_pallets'];
	$incomplete_pallets = $_POST['incomplete_pallets'];
	$delivery_date=$_POST['delivery_date'];
	$quantity = $_POST['quantity'];
	$payment_method = $_POST['payment'];
	$serial=$_POST['serial'];
	$receipt=$_POST['receipt'];
	$driver=$_POST['driver'];
	$user_id=$_SESSION['id'];
	$title = $_POST['title'];
	$text = strip_tags($_POST['text']);
		$result=mysqli_query($mysqli,"UPDATE `cleared_goods` SET `serial_number`='$serial',`quantity`='$quantity',`conditions`='$conditions',`full_pallets_qty`='$full_pallets',`half_pallets_qty`='$incomplete_pallets',`recipient`='$customer',`payment_method`='$payment',`receipt_code`='$receipt',`delivery_date`='$delivery_date',`user_id`='$user_id',`assigned_driver`='$driver' WHERE id=$id");
		// $result = mysqli_query($mysqli, "UPDATE articles SET title='$title', text_content='$text' WHERE id=$id");
		echo "<script type='text/javascript'>";
		echo "alert('Article Updated successfully!!')";
		echo "</javascript>";
		header("Location: verifyTransitGoods.php");


	// }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM cleared_goods WHERE id=$id") or die("Could not execute query".mysqli_error($mysqli));
// print_r(id);
while($res = mysqli_fetch_array($result))
{
	$serial=$res['serial_number'];
	$conditions = $res['conditions'];
	$recipient= $res['recipient'];
	$full_pallets=$res['full_pallets_qty'];
	$incomplete_pallets=$res['half_pallets_qty'];
	$delivery_date=$res['delivery_date'];
	$receipt=$res['receipt_code'];
	$driver=$res['assigned_driver'];
	$customer=$res['recipient'];
	$quantity=$res['quantity'];
	$payment=$res['payment_method'];
}
?>
<div class="container p-3">
		<div class="p-3">
			<a class="btn btn-info" href="verifyTransitGoods.php">View Cleared Goods</a>
		</div>
			<form name="form1" method="post" action="">
				<div class="row">
				<div class="col-md-6">
				<div class="form-group">
					<label for="">Goods Conditions</label>
					<input class="form-control" type="text" name="conditions" value="<?php echo $conditions ?>">
				</div>
				<div class="form-group">
			    <label for="exampleFormControlSelect1">Recepient Customer</label>
			    <select name="customer" class="form-control" id="exampleFormControlSelect1" value="<?php echo $customer ?>">
						<?php
							$customers=mysqli_query($mysqli,"SELECT * FROM `users` WHERE `role`='Customer'");
							while ($result=mysqli_fetch_array($customers)) {
								echo("<option value='".$result['id']."'>".$result['name']."</option>");
							}
						 ?>
			    </select>
		    </div>
				<div class="form-group">
					<label for="">Full Pallets(qty)</label>
				<input class="form-control" type="text" name="full_pallets" value="<?php echo $full_pallets ?>" required>
				</div>
				<div class="form-group">
					<label for="">Incomplete Pallets(qty)</label>
					<input class="form-control" type="text" name="incomplete_pallets" value="<?php echo $incomplete_pallets ?>" required>
				</div>
				<div class="form-group">
					<label for="">Delivery Date</label>
					<input class="form-control" type="date" name="delivery_date" value="<?php echo $delivery_date ?>" required>
				</div>
				<div class="form-group">
					<label for="">Receipt Code</label>
					<input class="form-control" type="text" name="receipt" value="<?php echo $receipt ?>" required>
				</div>
				<div class="form-group">
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					<input type="submit" name="update" value="Update Goods" class="btn btn-primary btn-block"></td>
					<!-- <input type="submit" name="Submit" class="btn btn-primary btn-block" value="Add Articles"> -->
				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Serial Number</label>
						<input class="form-control" type="text" name="serial" value="<?php echo $serial ?>" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Assigned Driver</label>
						<select name="driver" class="form-control" value="<?php echo $driver ?>">
							<?php
								$customers=mysqli_query($mysqli,"SELECT * FROM `users` WHERE `role`='Driver'");
								while ($result=mysqli_fetch_array($customers)) {
									echo("<option value='".$result['id']."'>".$result['name']."</option>");
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Quantity of Goods</label>
						<input class="form-control" type="text" name="quantity" value="<?php echo $quantity ?>" required>
					</div>
					<div class="form-group">
				    <label for="exampleFormControlSelect1">Payment Method</label>
				    <select name="payment" class="form-control">
							<option>Bank</option>
							<option>Cash</option>
							<option>MPESA</option>
				    </select>
			    </div>
				</div>
			</form>
		<!-- <script type="text/javascript">
					CKEDITOR.replace('text');
					CKEDITOR.config.fillEmptyBlocks = false;
		</script> -->
</div>
</div>
<?php include('footer.php'); ?>
