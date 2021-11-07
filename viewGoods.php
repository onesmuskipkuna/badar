
<?php
//including the database connection file
include('header.php');
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM cleared_goods");
// while($row=mysqli_fetch_array($result)){
// 	$status=$row['status'];
// }
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
?>
<div class="container-fluid p-4">


<!-- <div class="p-2 ml-auto">
 <a href="addGoods.php" class="btn btn-info mt3">Add New Good</a>
</div> -->

	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Goods Conditions</td>
			<td>Recipient Name</td>
			<!-- <td>Full Pallets(qty)</td>
			<td>Incomplete Pallets(qty)</td> -->
      <td>Delivery Date</td>
      <td>Quantity</td>
      <td>Payment Method</td>
      <td>Receipt Code</td>
			<td>Status</td>
      <td colspan="2">Actions</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			$status=$res['status'];
			if ($status==1) {
				$status="Released";
			}elseif ($status==2) {
				$status="Withheld";
			}else {
				$status="Pending";
			}
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['conditions']."</td>";
			echo "<td>".$res['recipient']."</td>";
			// echo "<td>".$res['full_pallets_qty']."</td>";
      // echo "<td>".$res['half_pallets_qty']."</td>";
      echo "<td>".$res['delivery_date']."</td>";
      echo "<td>".$res['quantity']."</td>";
      echo "<td>".$res['payment_method']."</td>";
      echo "<td>".$res['receipt_code']."</td>";
			echo "<td>".$status."</td>";
			echo "<td><button id='release' class='btn btn-primary' value='".$res['id']."'  onClick=\"return confirm('You are about to confirm release of those goods?')\">Release</button> <button id='held' value='".$res['id']."' class='btn btn-danger' onClick=\"return confirm('You are about to deny goods delivery?')\">Hold</button></td>";
		}
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#release").click(function(){
					var release=$(this).attr("value");
					// var hold_id=('#held').val();
					console.log(release);
					$.ajax({
						url:'updateStatus.php',
						method:'POST',
						data:{
							release:release
							// hold_id:hold_id
						},
						success:function(response){
							alert(response);
						}
					});
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#held").click(function(){
					var hold_id=$(this).attr("value");
					// var hold_id=('#held').val();
					console.log(hold_id);
					$.ajax({
						url:'updateStatusHeld.php',
						method:'POST',
						data:{
							// release:release
							hold_id:hold_id
						},
						success:function(response){
							alert(response);
						}
					});
				});
			});
		</script>
</div>
