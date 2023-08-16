<?php
session_start();
require ('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="img/jpg" href="image/logo.png">

	<title>Materials & Kind Delete</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul>
	    			<li>
	   					<form action="CrudMaterial.php" method="post">
	    				<input type="submit" name="back" value="Back"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	    		</ul>
	    	</nav>
	    </div>
     </header>
     <div>
     	<p>Are you sure, Do you want delete <?php echo "#".$_GET['deleteID'] ." ". $_GET['deleteFname']." ".$_GET['deleteLname'] ?> </p>
     	<form action="#" method="post">
     		<input type="submit" name="yesDelete" value="YES">
     	</form>
     	<form action="CrudMaterial.php" method="post">
     		<input type="submit" name="cancelDelete" value="CANCEL">
     	</form>
     </div>
<?php  
if(isset($_SESSION['username'])){
if (isset($_POST['yesDelete'])) {
$last_id_delete = $_GET['deleteID'];
$queryDelete = "DELETE FROM donation1 WHERE donation1.donation1_id = '".$last_id_delete."'";
$sqlDelete = mysqli_query($conn, $queryDelete);

echo '<script>alert("Succesfully Deleted #ID '.$last_id_delete.'")</script>';
echo '<script>window.location.href = "CrudMaterial.php"</script>';
}
}

?>
</body>
</html>


