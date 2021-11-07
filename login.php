
<?php
include('header.php');
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	// if($user == "" || $pass == "") {
	// 	echo "Either username or password field is empty.";
	// 	echo "<br/>";
	// 	echo "<a href='login.php'>Go back</a>";
	// } else {
		$result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");

		$row = mysqli_fetch_assoc($result);

		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['role']=$row['role'];
		} else {
			//echo "<script type='text/javascript'>";
			echo "<b>OOPS! Username or Password Incorrect</br> click register button on the right if you have not registered</b>";
			//echo "</script>";
			//header('Location:register.php');
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');
		// }
	}
} else {
?>
<div class="container p-4">
	<div class="row justify-content-center">
		<div class="col-lg-4 col-offset-5 align-center">
			<div>
				<p class="h4 text-center">Welcome Back</p>
					<form name="form1" method="post" action="">
						<div class="form-group">
							<label for="">Username</label>
							<input class="form-control " type="text"  name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input class="form-control " placeholder="Password" type="password" name="password">
						</div>
						<div class="form-check">
							 <input type="checkbox" class="form-check-input">
							 <label class="form-check-label" for="exampleCheck1">Remember me</label>
						 </div>
						<div class="form-group">
							<input class="btn btn-primary btn-block " type="submit" name="submit" value="Login">
                            <p><a href="pass_recovery/enter_email.php">Forgot your password?</a></p>
						</div>
					</form>
				</div>
		</div>
	</div>
	<!-- <div class="col-md-4">

	</div> -->
	</div>
	<div class="p-4 ">
		<div class="jumbotron text-center bg-warning">
				<p class="text-white">The project was done by Kiprotich</p>
		</div>

	</div>
	</div>
<?php
}
?>
