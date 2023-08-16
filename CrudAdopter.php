<?php  
include ('readAdopter.php');
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
			padding-right: 100px;
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
			background-color: #0034FF77
			color:white;
			font-weight: 900;
		}

		.records table{
			border: 2px solid #0080FF77;
			background-color: #2b58ab;
			box-shadow: gray 2px 2px 3px; 
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

		.line{
			
			border: 1px dashed orange; 
			margin-top: 30px;
			margin-bottom: 30px;
			margin-left: 100px;
			margin-right: 100px;
		}

		.noBot{
			border-top: none;
			border-left: none;
		}
		
		.records th {
			color: #FFEF00 ;
			text-shadow: gray 1px 1px 3px;
			width: 300px;
		}

	</style>
	<title>Adopter | Welcome</title>
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
	<h3>ADD ADOPTER</h3>
	<form  action="createAdopter.php" method="post" enctype="multipart/form-data">	
	<table>
		<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
		</td>
		<td>
			<p><input type="text" name="adopterFname" placeholder="Enter Firstname" size="10" required/></p>
			<p><input type="text" name="adopterLname" placeholder="Enter Lastname" size="10" required/></p>
		</td>
		<td style="padding-left: 100px">
			<p><label>Contact No:</label></p>
			<p><label>Address:</label></p>
		</td>
		<td>
			<p><input type="text" name="adopterContact" placeholder="Enter Contact No." size="20" required/></p>
			<p><input type="text" name="adopterAddress" placeholder="Enter Address" size="20" required/></p>
		</td>
	</table>	
	<h3 class="btncreate"><input type="submit" name="adopterCreate" value="CREATE"></h3>
	</form>
</div>

<div class="records">
<h3>ADOPTER RECORD</h3>	 
<?php 
if (isset($_SESSION['username'])) {
while($result = mysqli_fetch_array($adopterSql)){?>
<section>
	<div>
		<table border="1" style="border-collapse: collapse;">
		<tr>
			<th class="labels">Adopter Info</th>
			<th class="labels">Animal Adopted</th>
		</tr>
		<td class="labels" style="padding-left: 50px">
			<p>ID: <?php echo $result['adopter_id'] ?></p>
			<p>First Name: <?php echo $result['adopter_fname'] ?></p>
			<p>Last Name: <?php echo $result['adopter_lname'] ?></p>
			<p>Contact No: <?php echo $result['adopter_contact'] ?></p>
			<p>Address: <?php echo $result['adopter_address'] ?></p>
		</td>
		<td class="labels">
			<?php  
			require('includes/config.php');
				$adoptAnimalQuery = "SELECT animal.animal_id, animal.animal_name FROM animal, adopter Where animal.adopter_id = adopter.adopter_id AND adopter.adopter_id = '".$result['adopter_id']."' ";
				$adoptAnimalSql = mysqli_query($conn, $adoptAnimalQuery);

				while ($adoptAnimal = mysqli_fetch_array($adoptAnimalSql)) { 
					 echo "<p>#ID".$adoptAnimal['animal_id']." ". $adoptAnimal['animal_name']."</p>";
					 }
		 ?>
		</td>	
		</table>
		<h3>
				<form action="updateAdopter.php" method="get">
					<input type="hidden" name="editID" value="<?php echo $result['adopter_id'] ?>">
					<input type="hidden" name="editFname" value="<?php echo $result['adopter_fname'] ?>">
					<input type="hidden" name="editLname" value="<?php echo $result['adopter_lname'] ?>">
					<input type="hidden" name="editContact" value="<?php echo $result['adopter_contact'] ?>">
					<input type="hidden" name="editAddress" value="<?php echo $result['adopter_address'] ?>">
					<input type="submit" name="editAdopter" value="EDIT" style="width: 80px">
				</form>

				<form action="deleteAdopter.php" method="get">
					<input type="hidden" name="deleteID" value="<?php echo $result['adopter_id']?>">
					<input type="hidden" name="deleteFname" value="<?php echo $result['adopter_fname'] ?>">
					<input type="hidden" name="deleteLname" value="<?php echo $result['adopter_lname'] ?>">
					<input type="submit" name="deleteAdopter" value="DELETE" style="width: 80px">
				</form>
		<h3>
			<div class="line"></div>
			</div>
		</section>
<?php 				
}
}
else
{echo '<script>window.location.href = "login.php"</script>';}
?>
</section>
</div>
<footer>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
</body>
</html>

