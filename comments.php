
<?php
// including the database connection file
include('header.php');
include_once("connection.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$title = $_POST['title'];
	$text = strip_tags($_POST['text']);

		$result = mysqli_query($mysqli, "UPDATE articles SET title='$title', text_content='$text' WHERE id=$id");
		echo "<script type='text/javascript'>";
		echo "alert('Article Updated successfully!!')";
		echo "</javascript>";
		header("Location: viewArticles.php");


	// }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM articles WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title = $res['title'];
	$text= $res['text_content'];
}
?>
<div class="container p-3">

<div class="p-3">
	<a class="btn btn-info" href="viewArticles.php">View Articles</a>
</div>


	<div class="row p-3">
		<div class="col-md-8">
	<form action="edit.php" method="post" name="form1">
		<div class="form-group">
			<label for="">Article Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo $title; ?>" required>
		</div>
		<div class="form-group">
			<label for="">Article Text </label>
			<textarea type="text" name="text" class="form-control"  required><?php echo '<p>'.$text.'</p>'; ?></textarea>
		</div>

		<div class="form-group">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" value="Update Article" class="btn btn-primary btn-block"></td>
			<!-- <input type="submit" name="Submit" class="btn btn-primary btn-block" value="Add Articles"> -->
		</div>
		</div>
	</form>
	</div>
		<script type="text/javascript">
					CKEDITOR.replace('text');
					CKEDITOR.config.fillEmptyBlocks = false;
		</script>

</div>
<?php include('footer.php'); ?>
