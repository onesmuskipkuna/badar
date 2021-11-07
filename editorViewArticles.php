
<?php
//including the database connection file
include('header.php');
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT articles.id,articles.title,articles.text_content ,users.name FROM articles  INNER JOIN users ON articles.login_id=users.id");
// login_id=".$_SESSION['id'].
// $user=mysqli_query();
?>
<div class="container p-4">
	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Article Title</td>
			<td>Article Text </td>
			<td>Author</td>
			<td colspan="2">Actions</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['title']."</td>";
			echo "<td>".$res['text_content']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td><a  class='btn btn-primary' href=\"editor.php?id=$res[id]\">Edit</a></td>";
		}
		?>
</div>
