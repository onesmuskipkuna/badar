<?php
//including the database connection file
include('header.php');
include_once("connection.php");
$driver_id=$_SESSION['id'];
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM cleared_goods INNER JOIN users ON cleared_goods.recipient=users.id WHERE assigned_driver=$driver_id");
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
?>
<div class="container-fluid p-4">
	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Goods Conditions</td>
			<td>Recipient Name</td>
			<td>Full Pallets(qty)</td>
			<td>Incomplete Pallets(qty)</td>
      <td>Date to be Delivered</td>
      <td>Quantity</td>
      <!-- <td>Actions</td> -->
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['conditions']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['full_pallets_qty']."</td>";
      echo "<td>".$res['half_pallets_qty']."</td>";
      echo "<td>".$res['delivery_date']."</td>";
      echo "<td>".$res['quantity']."</td>";
			// echo "<td><a class='btn btn-danger' href=\"deleteUser.php?id=$res[id]\" onClick=\"return confirm('You agree to have checked and confirm the goods in transit?')\">Verify Now</a></td>";
		}
		?>
</div>
