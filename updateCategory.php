<?php 
include("connect.php");
session_start();
if($_SESSION['store_keeper']==NULL){
    header("location:login.php");
} else {
?>

<?php
	// include("connect.php");
	if(isset($_POST['btn']))
	{
		$item_name=$_POST['cname'];
		$item_qty=$_POST['cdescription'];
		
		$id = $_GET['id'];
		$q= "update categorytb set category_name='$item_name', category_description='$item_qty'
		 where id=$id";
		$query=mysqli_query($con,$q);
		header('location:index.php');
	}

	else if(isset($_GET['id']))
	{
		$q = "SELECT * FROM categorytb WHERE id='".$_GET['id']."'";
		$query=mysqli_query($con,$q);
		$res= mysqli_fetch_array($query);
	}
?>
<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">
	
	<title>Update Category</title>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container mt-5">
		<h1>Update Grocery List</h1>
		<form method="post">
			<div class="form-group">
				<label>Category name</label>
				<input type="text"
					class="form-control"
					name="cname"
					placeholder="category_name"
					value=
		"<?php echo $res['category_name'];?>" />
			</div>

			<div class="form-group">
				<label>Category Description</label>
				<input type="text"
					class="form-control"
					name="cdescription"
					placeholder="category_description"
value="<?php echo $res['category_description'];?>" />
			</div>

			

			

			<div class="form-group">
				<input type="submit" value="Update"
					name="btn" class="btn btn-primary">
				<input type="submit" value="Delete"
					name="dlt" class="btn btn-danger">
			</div>
		</form>
	</div>
</body>

</html>
<?php
 if(isset($_POST['dlt'])){
 	$id = $_GET['id'];
 	// $d = "delete from grocerytb where category = '".$res['category_name']."' ";
 	// mysqli_query($con,$d);
 	$q = "delete from categorytb where id = $id";
 	mysqli_query($con,$q);
    header('location:index.php');
 }
 ?>
<?php } ?>
