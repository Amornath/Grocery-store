<?php 
include("connect.php");
session_start();
if($_SESSION['store_keeper']==NULL){
    header("location:login.php");
} else {
?>

<?php
	include("connect.php");
	$id = $_GET['id'];
	$q = "delete from grocerytb where Id = $id ";
	mysqli_query($con,$q);
    header('location:index.php');	
?>
<?php } ?>
