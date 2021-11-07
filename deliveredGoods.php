<?php
//including the database connection file
include('header.php');
include_once("connection.php");
// $driver_id=$_SESSION['id'];
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM delivered_goods INNER JOIN users ON delivered_goods.customer_id=users.id INNER JOIN cleared_goods ON delivered_goods.goods_id=cleared_goods.id") or die("Could not execute that query".mysqli_error($mysqli));
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
?>
<div class="container-fluid p-4">
	<table class="table table-striped">
		<tr>
			<td>#</td>
			<!-- <td>Driver Name</td> -->
			<td>Customer Name</td>
			<td>Customer Comments</td>
			<td>Date Receieved</td>
			<td>Serial Number</td>
      <!-- <td>Date to be Delivered</td>
      <td>Quantity</td> -->
      <!-- <td>Actions</td> -->
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['customer_comments']."</td>";
      echo "<td>".$res['date_received']."</td>";
      echo "<td>".$res['serial_number']."</td>";
      // echo "<td>".$res['quantity']."</td>";
			// echo "<td><a class='btn btn-danger' href=\"deleteUser.php?id=$res[id]\" onClick=\"return confirm('You agree to have checked and confirm the goods in transit?')\">Verify Now</a></td>";
		}
		?>
</div>
