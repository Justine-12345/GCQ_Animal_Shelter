<?php  
include ('readRescuer.php');
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
			font-weight: 900
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
			background-color: orange;
			height: 1px;
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
		}

	</style>
	<title>Rescuer | Welcome</title>
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

	<form  action="createRescuer.php" method="post" enctype="multipart/form-data">
	<h3>ADD RESCUER</h3>
	<table>
		<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
			<p><label>Gender:</label></p>
			<p><label>Age:</label></p>
		</td>	
		<td>
			<p><input type="text" name="rescuerFname" placeholder="Enter Firstname" size="10" required/></p>
			<p><input type="text" name="rescuerLname" placeholder="Enter Lastname" size="10" required/></p>
			<p>
			<input type="radio" name="rescuerGender" value="Male" required>
			<label for="male">Male</label>
			<input type="radio" name="rescuerGender" value="Female">
			<label for="female">Female</label><br>
			</p>
			<p><input type="number" name="rescuerAge" min="18" max="200" step="1" size="15" placeholder="Age" required/></p>
		</td>
		<td class="labels">
			<p><label>Contact No:</label></p>
			<p><label>Address:</label></p>
			<p><label>Profile Picture:</label></p>
		</td>	
		<td>
			<p><input type="text" name="rescuerContact" placeholder="Enter Contact No." size="20" required/></p>
			<p><input type="text" name="rescuerAdress" placeholder="Enter Address" size="20"/></p>
			<p><input type="file" name="fileToUpload" id="fileToUpload"></p>
		</td>
	</table>
	<h3 class="btncreate"><input type="submit" name="rescuerCreate" value="CREATE"></h3>
	</form>

</div>

<div class="records">
<h3>RESCUER RECORD</h3>	 
<?php 
if (isset($_SESSION['username'])) {
while($result = mysqli_fetch_array($rescuerSql)){?>
<section>
		<table>
		
		<tr>
			<th></th>
			<th>Rescuer Info</th>
			<th class="labels" style="padding-right: 100px">Animal Rescued</th>
		</tr>
			<td>
			<?php echo "<img src='image/".$result['rescuer_picture']."' style='width: 200px; height: 200px' alt='Rescuer_image'>" ?>
			</td>
		<td style="padding-left: 50px">
			<p>ID: <?php echo $result['rescuer_id'] ?></p>
			<p>First Name: <?php echo $result['rescuer_fname'] ?></p>
			<p>Last Name: <?php echo $result['rescuer_lname'] ?></p>
			<p>Gender: <?php echo $result['rescuer_gender'] ?></p>
			<p>Age: <?php echo $result['rescuer_age'] ?></p>
			<p>Contact No: <?php echo $result['rescuer_contact'] ?></p>
			<p>Address: <?php echo $result['rescuer_address'] ?></p>
		</td>
		
		<td class="labels">
			<?php  
			require('includes/config.php');
				$rescuedAnimalQuery = "SELECT animal.animal_id, animal.animal_name FROM animal, rescuer Where animal.rescuer_id = rescuer.rescuer_id AND rescuer.rescuer_id = '".$result['rescuer_id']."' ";
				$rescuedAnimalSql = mysqli_query($conn, $rescuedAnimalQuery);

				while ($resAnimal = mysqli_fetch_array($rescuedAnimalSql)) { 

					 echo "<p>#ID".$resAnimal['animal_id']." ". $resAnimal['animal_name']."</p>";
					 }
		 ?>
		</td>	
	
		</table>
		<h3>
				<form action="updateRescuer.php" method="get">
					<input type="hidden" name="editID" value="<?php echo $result['rescuer_id'] ?>">
					<input type="hidden" name="editFname" value="<?php echo $result['rescuer_fname'] ?>">
					<input type="hidden" name="editLname" value="<?php echo $result['rescuer_lname'] ?>">
					<input type="hidden" name="editGender" value="<?php echo $result['rescuer_gender'] ?>">
					<input type="hidden" name="editAge" value="<?php echo $result['rescuer_age'] ?>">
					<input type="hidden" name="editContact" value="<?php echo $result['rescuer_contact'] ?>">
					<input type="hidden" name="editAddress" value="<?php echo $result['rescuer_address'] ?>">
					<input type="hidden" name="editPic" value="<?php echo "<img src='image/".$result['rescuer_picture']."' style='width: 100px; height: 100px' alt='Rescuer_image'>" ?>">
					<input type="hidden" name="editPicName" value="	<?php echo  $result['rescuer_picture'] ?>" >
					<input type="submit" name="editRescuer" value="EDIT" style="width: 80px">
				</form>
				<form action="deleteRescuer.php" method="get">
					<input type="hidden" name="deleteID" value="<?php echo $result['rescuer_id']?>">
					<input type="hidden" name="deleteFname" value="<?php echo $result['rescuer_fname'] ?>">
					<input type="hidden" name="deleteLname" value="<?php echo $result['rescuer_lname'] ?>">
					<input type="submit" name="deleteRescuer" value="DELETE" style="width: 80px">
				</form>
			</h3>
			<div class="line"></div>
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

