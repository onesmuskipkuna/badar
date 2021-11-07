<?php
//including the database connection file
include('header.php');
include_once("connection.php");

//fetching data in descending order (lastest entry first)
// $result = mysqli_query($mysqli, "SELECT * FROM cleared_goods INNER JOIN users on cleared_goods.recipient=users.id");
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
$result = mysqli_query($mysqli, "SELECT * FROM users INNER JOIN cleared_goods  on users.id=cleared_goods.recipient");

?>
<div class="container-fluid p-4">
	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Goods Conditions</td>
			<td>Recipient Name</td>
			<td>Full Pallets(qty)</td>
			<td>Incomplete Pallets(qty)</td>
      <td>Delivery Date</td>
      <td>Quantity</td>
      <!-- <td>Paymemt Method</td> -->
      <td>Receipt Code</td>
      <td colspan="2">Actions</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			$goodId=$res['id'];
			// var_dump($goodId).exit;
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['conditions']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['full_pallets_qty']."</td>";
      echo "<td>".$res['half_pallets_qty']."</td>";
      echo "<td>".$res['delivery_date']."</td>";
      echo "<td>".$res['quantity']."</td>";
    //  echo "<td>".$res['payment_method']."</td>";
      echo "<td>".$res['receipt_code']."</td>";
			echo "<td><a  class='btn btn-primary' href=\"editGoods.php?id=$res[id]\">Edit</a> <a class='btn btn-danger' href=\"deleteGoods.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
</div>
