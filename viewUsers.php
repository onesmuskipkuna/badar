
<?php
//including the database connection file
include('header.php');
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users");
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
?>
<div class="container p-4">


<div class="p-2 ml-auto">
 <a href="addUser.php" class="btn btn-info mt3">Add New User</a>
</div>

	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Name</td>
			<td>Email</td>
			<td>Username</td>
			<td>Role</td>
      <td colspan="2">Actions</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['username']."</td>";
      echo "<td>".$res['role']."</td>";
			echo "<td><a  class='btn btn-primary' href=\"editUser.php?id=$res[id]\">Edit</a> <a class='btn btn-danger' href=\"deleteUser.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
</div>
