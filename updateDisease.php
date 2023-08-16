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
			margin-bottom: 30px;
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
			padding-bottom: 30px;
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
		}

		.lines{
			height: 30px;
		}

		.records th{
			width: 200px;
		}

		.actionButton {
			text-align: center;
		}

		.records td{
			text-align: center;
		}
	</style>
	<title>Cash Donation | Edit</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul>
	    			<li>
	   					<form action="CrudDisease.php" method="post">
	    				<input type="submit" name="back" value="Back"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	    			
	    		</ul>
	    	</nav>
	    </div>
     </header>

<div class="create">
<h3>EDIT DISEASE#<?php echo " ".$_GET['editID']." ". $_GET['editName']?></h3>	
	<form  action="#" method="post" enctype="multipart/form-data">
		<table>
			<td>
				<p><label>Disease Name:</label></p>
				<p><label>Disease Description:</label></p>
			</td>
			<td>				
				<p><input type="text" name="diseaseNameU" placeholder="Enter Disease Name" size="20" value="<?php echo $_GET['editName']?>" required/></p>

				<p><input type="text" name="diseaseDescU" placeholder="Enter Disease Description" size="20" value="<?php echo $_GET['editDesc']?>" required/></p>
			</td>
		</table>
	<h3 class="btncreate"><input type="submit" name="diseaseUpdate" value="UPDATE"></h3>
	</form>


<?php
if(isset($_SESSION['username'])){
if (isset($_POST['diseaseUpdate'])) {

$diseaseName = mysqli_real_escape_string($conn, $_POST['diseaseNameU']);
$diseaseDesc = mysqli_real_escape_string($conn, $_POST['diseaseDescU']);

$queryUpdate = "";

	$queryUpdate = "UPDATE disease SET disease_name = '".$diseaseName."', disease_desc = '".$diseaseDesc."'  WHERE disease_Id = '".$_GET['editID']."'";
		
	mysqli_query($conn, $queryUpdate);
echo '<script>alert("Succesfully Updated #ID'.$_GET['editID'].'")</script>';

echo '<script>window.location.href = "CrudDisease.php"</script>';

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
