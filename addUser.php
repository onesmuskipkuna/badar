
<?php
include('header.php');
// include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$role=$_POST['role'];

	// if($user == "" || $pass == "" || $name == "" || $email == "" || $role="") {
	// 	echo "<script type='text/javascript'>";
	// 	echo "alert('All fields are required');";
	// 	echo "</script>";
	// 	// echo "All fields should be filled. Either one or many fields are empty.";
	// 	// echo "<br/>";
	// 	// echo "<a href='register.php'>Go back</a>";
	// } else {
		mysqli_query($mysqli, "INSERT INTO users(name, email, username,role, password) VALUES('$name', '$email', '$user','$role', md5('$pass'))")
			or die("Could not execute the insert query.");

		echo "<script type='text/javascript'>";
		echo "alert('Your account has been created successfully!!')";
		echo "<script/>";
		header('Location:viewUsers.php');

	}
 else {
?>
<div class="container p-4">

<div class="row">

<div class="col-md-8">
	<p class="text-center h3">Add New User</p>
	<form name="form1" method="post" action="">
		<div class="form-group">
			<label for="">Full Name</label>
			<input class="form-control" type="text" name="name" required>
		</div>
		<div class="form-group">
			<label for="">Email</label>
		<input class="form-control" type="text" name="email" required>
		</div>
		<div class="form-group">
			<label for="">Username</label>
			<input class="form-control" type="text" name="username" required>
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input class="form-control" type="password" name="password" required>
		</div>
		<div class="form-group">
	    <label for="exampleFormControlSelect1">Select Role</label>
	    <select name="role" class="form-control" id="exampleFormControlSelect1">
	      <option>Admin</option>
	      <option>Clearence Officer</option>
	      <option>Sales Manager</option>
				<option>Customer</option>
				<option>Driver</option>
	    </select>
    </div>
		<!-- <div class="form-check">
			 <input type="checkbox" class="form-check-input" id="exampleCheck1">
			 <label class="form-check-label" for="exampleCheck1">By clicking  register You agree to our <a href="#">terms and conditions</a> </label>
		 </div> -->
		<div class="form-group">
			<input class="btn btn-primary btn-block" type="submit" name="submit" value="Add Now">
		</div>
	</form>
	</div>
 </div>
</div>
<?php
}
?>
<?php include('footer.php'); ?>
