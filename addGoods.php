
<?php
include('header.php');
// include("connection.php");

if(isset($_POST['submit'])) {
		$conditions =$_POST['conditions'];
		$customer =$_POST['customer'];
		$full_pallets = $_POST['full_pallets'];
		$incomplete_pallets = $_POST['incomplete_pallets'];
		$delivery_date=$_POST['delivery_date'];
		$quantity = $_POST['quantity'];
		$payment_method = $_POST['payment'];
		$serial=$_POST['serial'];
		$driver=$_POST['driver'];
		$user_id=$_SESSION['id'];
		// $payment_method= $_POST['payment_method'];
		// var_dump($payment_method).exit;;
		$receipt=$_POST['receipt'];
		mysqli_query($mysqli, "INSERT INTO cleared_goods(`serial_number`,`quantity`,`conditions`,`full_pallets_qty`,`half_pallets_qty`,`recipient`,`payment_method`,`receipt_code`, `delivery_date`, `user_id`, `assigned_driver`) VALUES ('$serial','$quantity','$conditions','$full_pallets','$incomplete_pallets','$customer','$payment_method','$receipt','$delivery_date','$user_id','$driver')")
			or die("Could not execute the insert query.".mysqli_error($mysqli));

		echo "<script type='text/javascript'>";
		echo "alert('Your account has been created successfully!!')";
		echo "<script/>";
		header('Location:verifyTransitGoods.php');

	}
 else {
?>
<div class="container p-4">




	<p class="text-center h3"></p>
	<form name="form1" method="post" action="">
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<label for="">Goods Conditions</label>
			<input class="form-control" type="text" name="conditions" required>
		</div>
		<div class="form-group">
	    <label for="exampleFormControlSelect1">Recepient Customer</label>
	    <select name="customer" class="form-control" id="exampleFormControlSelect1">
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
		<input class="form-control" type="text" name="full_pallets" required>
		</div>
		<div class="form-group">
			<label for="">Incomplete Pallets(qty)</label>
			<input class="form-control" type="text" name="incomplete_pallets" required>
		</div>
		<div class="form-group">
			<label for="">Delivery Date</label>
			<input class="form-control" type="date" name="delivery_date" required>
		</div>
		<div class="form-group">
			<label for="">Receipt Code</label>
			<input class="form-control" type="text" name="receipt" required>
		</div>
		<div class="form-group">
		 <input class="btn btn-primary ml-auto" type="submit" name="submit" value="Clear Now">
		</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Serial Number</label>
				<input class="form-control" type="text" name="serial" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Assigned Driver</label>
				<select name="driver" class="form-control" id="exampleFormControlSelect1">
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
				<input class="form-control" type="text" name="quantity" required>
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



 </div>
</div>
<?php
}
?>
<?php include('footer.php'); ?>
