<?php
//including the database connection file
include('header.php');
include_once("connection.php");
$customer_id=$_SESSION['id'];
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM cleared_goods INNER JOIN users ON cleared_goods.assigned_driver=users.id WHERE recipient=$customer_id") or die("Could not execute that query".mysqli_error($mysqli));
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
?>
<div class="container-fluid p-4">
	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Goods Conditions</td>
			<td>Driver Name</td>
			<td>Full Pallets(qty)</td>
			<td>Incomplete Pallets(qty)</td>
      <!-- <td>Delivery Date</td> -->
      <td>Quantity</td>
      <td>Actions</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			$_SESSION['goods_id']=$res['id'];
			// $_SESSION['condtions']=$res['conditions'];
			// $_SESSION['full_pallets']=$res['full_pallets_qty'];
			// $_SESSION['half_pallets']=$res['half_pallets_qty'];
			$_SESSION['driver_id']=$res['assigned_driver'];
			// $_SESSION['goods_id']=$res['id'];
			// $_SESSION['goods_id']=$res['id'];
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['conditions']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['full_pallets_qty']."</td>";
      echo "<td>".$res['half_pallets_qty']."</td>";
      // echo "<td>".$res['delivery_date']."</td>";
      echo "<td>".$res['quantity']."</td>";
			echo "<td><a href=\"verify.php?id=$res[id]\" id='acknowledge' class='btn btn-danger' onClick=\"return confirm('Confirm You have received Goods in perfect condition?')\">Acknowledge Receipt</a></td>";
		};
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				var val='@Request.RequestContext.HttpContext.Session["verifed"]';
				if (val=="verified") {
					$('#acknowledge').innerHTML="Received";
				}
			});
		</script>
</div>
