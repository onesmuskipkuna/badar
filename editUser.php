
<?php
// including the database connection file
include('header.php');
include_once("connection.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$role = $_POST['role'];

		$result = mysqli_query($mysqli, "UPDATE users SET name='$name', email='$email',username='$username',role='$role' WHERE id=$id");
		echo "<script type='text/javascript'>";
		echo "alert('User Updated successfully!!')";
		echo "</javascript>";
		header("Location: viewUsers.php");


	// }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$email= $res['email'];
	$username= $res['username'];
	$role= $res['role'];
}
?>
<div class="container p-3">

<div class="p-3">
	<a class="btn btn-info" href="viewUsers.php">View Users</a>
</div>


	<div class="row p-3">
		<div class="col-md-8">
	<form action="editUser.php" method="post" name="form1">
		<div class="form-group">
			<label for="">Full Name</label>
			<input class="form-control" type="text" name="name" value="<?php echo $name; ?>" required>
		</div>
		<div class="form-group">
			<label for="">Email</label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div class="form-group">
			<label for="">Username</label>
			<input class="form-control" type="text" name="username" value="<?php echo $username; ?>" required>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Select Role</label>
			<select name="role" class="form-control" >
				<option value="<?php echo $role; ?>" selected="selected"></option>
				<option>Admin</option>
				<option>Editor</option>
				<option>Author</option>
			</select>
		</div>


		<div class="form-group">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" value="Update User" class="btn btn-primary btn-block"></td>
			<!-- <input type="submit" name="Submit" class="btn btn-primary btn-block" value="Add Articles"> -->
		</div>
		</div>
	</form>
	</div>
		<script type="text/javascript">
					CKEDITOR.replace('text');
		</script>

</div>
<?php include('footer.php'); ?>
