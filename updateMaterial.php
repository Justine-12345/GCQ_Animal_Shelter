<?php
session_start();
require ('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="img/jpg" href="image/logo.png">

	<style>
		.labels{
			padding-left: 100px;
		}
		.create h3{
			text-align: center;
		}
		.create table {
			margin-left: auto;
			margin-right: auto;
		}

		.create {
			position: static;
			margin: 30px; 
			padding-top: 30px;
			padding-bottom: : 30px;
			background-color: #0080FF77;
			border-radius: 10px;
			border: 10px dashed orange; 
			color: white;
			font-weight: 900;
		}
		#mainHeader{
			border-bottom: 10px solid orange;
		}
	.btncreate input {
			margin: 30px;
			padding-left: 30px; 
			padding-right: 30px;
			background-color: #0034FF77;
			font-weight: 900;
			color: white;
		}
		.records h3{
			text-align: center;
			margin-bottom: 50px;
		}
		.records {
			position: static;
			margin: 30px; 
			padding-top: 30px;
			padding-bottom: : 30px;
			background-color: #0080FF77;
			border-radius: 10px;
			border: 10px dashed orange; 
			color: white;
			font-weight: 900;}
		.records table {
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 30px;
		}

		.records th {
			width: 100px;
		}

		.records td {
			text-align: center;
		}

		.line{
			background-color: orange;
			height: 1px;
			margin-top: 30px;
			margin-bottom: 30px;
			margin-left: 100px;
			margin-right: 100px;
		}
	</style>
	<title>Materials & Kind | Edit</title>
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

<div class="create">
    <h3>EDIT DONATION #<?php echo " ".$_GET['editID']." ". $_GET['editFname']." ".$_GET['editLname'] ?></h3>	
	<form  action="#" method="post" enctype="multipart/form-data">
		<table>
			<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
		</td>
		<td>
			<p><input type="text" name="materialFnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editFname']?>" required/></p>

			<p><input type="text" name="materialLnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editLname']?>" required/></p>
		</td>
		<td class="labels">
			<p><label>Material/Kinds:</label></p>
			<p><label>Date:</label></p>
		</td>
		<td>
			<p><input type="text" name="materialTypeU" placeholder="Enter Materials or Kinds" size="15" value="<?php echo $_GET['editType']?>" required/></p>

			<p><input type="date" name="materialDateU" placeholder="Enter Date" size="10" value="<?php echo $_GET['editDate']?>" required/></p>
		</td>
		</table>
	<h3 class="btncreate"><input type="submit" name="materialUpdate" value="UPDATE"></h3>
	</form>	
<?php
if(isset($_SESSION['username'])){
if (isset($_POST['materialUpdate'])) {
$materialFname = mysqli_real_escape_string($conn, $_POST['materialFnameU']);
$materialLname = mysqli_real_escape_string($conn, $_POST['materialLnameU']);
$materialType = mysqli_real_escape_string($conn, $_POST['materialTypeU']);
$materialDate = mysqli_real_escape_string($conn,$_POST['materialDateU']);
$queryUpdate = "";
	$queryUpdate = "UPDATE donation1 SET donation1_fname = '".$materialFname."', donation1_lname = '".$materialLname."', donation1_type =  '".$materialType."',  donation1_date = '".$materialDate."' WHERE donation1_id =  '".$_GET['editID']."'";
	mysqli_query($conn, $queryUpdate);
echo '<script>alert("Succesfully Updated #ID'.$_GET['editID'].'")</script>';
echo '<script>window.location.href = "CrudMaterial.php"</script>';
}
}
?>
</div>
<footer style="position: absolute; bottom: 0px; width: 100%"><div>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer> 
</body>
</html>
