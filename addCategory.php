<?php 
include("connect.php");
session_start();
if($_SESSION['store_keeper']==NULL){
    header("location:login.php");
} else {
?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Add Category</title>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container mt-5">
		<h1>Add New Category</h1>
		<form action="addCategory.php" method="POST">
			<div class="form-group">
				<label>Category name</label>
				<input type="text"
					class="form-control"
					placeholder="Category name"
					name="cname" />
			</div>

			<div class="form-group">
				<label>Category Description</label>
				<input type="text"
					class="form-control"
					placeholder="Category Description"
					name="cdescription" />
			</div>

			
			
			<div class="form-group">
				<input type="submit"
					value="Add"
					class="btn btn-danger"
					name="btn">
			</div>
		</form>
	</div>

	<?php
		if(isset($_POST["btn"])) {
			// include("connect.php");
			$category_name=$_POST['cname'];
			$category_description=$_POST['cdescription'];
			
	

			$q="insert into categorytb(category_name,
			category_description)
			values('$category_name',
			'$category_description')";

			mysqli_query($con,$q);
			header("location:index.php");
		}
		
		// if(!mysqli_query($con,$q))
		// {
			// echo "Value Not Inserted";
		// }
		// else
		// {
			// echo "Value Inserted";
		// }
	?>
</body>

</html>
<?php } ?>
