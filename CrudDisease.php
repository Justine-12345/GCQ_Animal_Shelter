<?php  
include ('readDisease.php');
session_start();
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

		.records table{
			border: 2px solid #0080FF77;
			background-color: #2b58ab;
			box-shadow: gray 2px 2px 3px; }

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

		.records th {
			color: #FFEF00 ;
			text-shadow: gray 1px 1px 3px;
			width: 300px;
		}
	</style>
	<title>Disease | Welcome</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul style="display: inline">
	    			<li>
	   					<form action="logout.php" method="post">
	    				<input type="submit" name="logout" value="Log-out"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px">
	    				</form>
	    			</li>
	    			<li>
	   					<form action="adminPanel.php" method="post">
	    				<input type="submit" name="adminPanel" value="Admin"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	   				
	    		</ul>
	    	</nav>
	    </div>
     </header>
<div class="create">
	<h3>ADD DISEASE</h3>	
	<form  action="createDisease.php" method="post" enctype="multipart/form-data">
		<table>
			<td>
				<p><label>Disease Name:</label></p>
				<p><label>Disease Description:</label></p>
			</td>
			<td>
				<p><input type="text" name="diseaseName" placeholder="Enter Disease Name" size="25" required/></p>
				<p><input type="text" name="diseaseDesc" placeholder="Enter Disease Description" size="25" height="100" required/></p>
			</td>
		</table>
	<h3 class="btncreate"><input type="submit" name="diseaseCreate" value="CREATE"></h3>
	</form>
  </div>

<div class="records">
<h3>DISEASE RECORD</h3>	 
		<table border="1" style="border-collapse: collapse;" >
		<tr>
			<th>IDs</th>
			<th>Disease Name</th>
			<th>Disease Description</th>
			<th>Actions</th>
		</tr>
<?php 
if (isset($_SESSION['username'])) {
while($result = mysqli_fetch_array($diseaseSql)){?>
		 <tr>
			<td><?php echo $result['disease_Id'] ?></td>
			<td><?php echo $result['disease_name'] ?></td>
			<td><?php echo $result['disease_desc'] ?></td>
			<td >
				<form action="updateDisease.php" method="get">
					<input type="hidden" name="editID" value="<?php echo $result['disease_Id'] ?>">
					<input type="hidden" name="editName" value="<?php echo $result['disease_name'] ?>">
					<input type="hidden" name="editDesc" value="<?php echo $result['disease_desc'] ?>">
					<input type="submit" name="editDisease" value="EDIT"  style="width: 80px"> 
				</form>
			
				<form action="deleteDisease.php" method="get">
					<input type="hidden" name="deleteID" value="<?php echo $result['disease_Id']?>">
					<input type="hidden" name="deleteName" value="<?php echo $result['disease_name'] ?>">
					<input type="submit" name="deleteDisease" value="DELETE"  style="width: 80px">
				</form>	
			</td>
		</tr>	
<?php 
}
}
else
{echo '<script>window.location.href = "login.php"</script>';}
?>
</table>
	<div class="lines"></div>
</div>


<footer>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
</body>
</html>

