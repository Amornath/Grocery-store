<?php 
include("connect.php");
session_start();
if($_SESSION['store_keeper']==NULL){
    header("location:login.php");
} else {
?>

<?php
	
   
	if (isset($_POST['btn'])) {
		$date=$_POST['idate'];
		$q="select * from grocerytb where Date='$date'";
		$query=mysqli_query($con,$q);
	}
	else {
		$q= "select * from grocerytb";
		$query=mysqli_query($con,$q);
	}
?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>View List</title>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet"
		href="css/style.css">
</head>

<body>
	<div class="container mt-5">
		
		<!-- top -->
		<div class="row">
			<div class="col-lg-8">
				<h1>View Grocery List</h1>
				<a href="add.php">Add Item</a>
                <a style="padding-left: 40px;" href="logout.php">Logout</a>
                <a style="padding-left: 40px;" href="addCategory.php">Add Category</a>
			</div>
			
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-8">
						
						<!-- Date Filtering-->
						<form method="post" action="">
							<input type="date"
								class="form-control"
								name="idate">
						
							<div class="col-lg-4"
								method="post">
								<input type="submit"
								class="btn btn-danger float-right"
								name="btn" value="filter">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				 <?php
				 $res=mysqli_query($con,"select * from categorytb");
				 while($row=mysqli_fetch_array($res)){ ?>
				<a href="updateCategory.php?id=<?php echo $row['id']; ?>" style="color: green;"><?php echo $row["category_name"]; ?></a>
				<a style="padding-left: 40px;"></a>
                <?php } ?>
			</div>
		</div>

		<!-- Grocery Cards -->
		<div class="row mt-4">
			<?php
				while ($qq=mysqli_fetch_array($query))
				{
			?>

			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo $qq['Item_name']; ?>
						</h5>
						<h6 class="card-subtitle mb-2 text-muted">
							<?php echo
							$qq['Item_Quantity']; ?>
						</h6>
						<?php
						if($qq['Item_status'] == 0) {
						?>
						<p class="text-info">PENDING</p>

						<?php
						} else if($qq['Item_status'] == 1) {
						?>
						<p class="text-success">BOUGHT</p>

						<?php } else { ?>
						<p class="text-danger">NOT AVAILABLE</p>

						<?php } ?>
						<a href=
						"delete.php?id=<?php echo $qq['id']; ?>"
							class="card-link">
							Delete
						</a>
						<a href=
						"update.php?id=<?php echo $qq['id']; ?>"
							class="card-link">
							Update
						</a>
					</div>
				</div><br>
			</div>

			<?php
			}
			?>
			
		</div>
	</div>
</body>

</html>

<?php } ?>
