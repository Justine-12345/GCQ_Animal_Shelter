<?php  
include ('readAnimal.php');
include ('readDisease.php');
include ('readAdopter.php');
include ('readEmployee.php');
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

		.guide{
			margin-left: 5px;
			font-size: 8;
			font-weight: 300;
			font-style: italic;
		}

	</style>
	<title>Animal | Welcome</title>
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
	<form  action="createAnimal.php" method="post" enctype="multipart/form-data">
	<h3>ADD ANIMAL</h3>
	<table>
		<td>
			<p><label>Name:</label></p>
			<p><label>Type:</label></p>
			<p><label>Gender:</label></p>
			<p><label>Color:</label></p>
		</td>	
		<td>
			<p>
			<input type="text" name="animalName" placeholder="Enter names" size="10" required/>
			</p>
			<p>
			<input type="radio" name="animalType" value="Dog" required>
			<label for="dog">Dog</label>
			<input type="radio" name="animalType" value="Cat">
			<label for="cat">Cat</label><br>
			</p>
			<p>
			<input type="radio" name="animalGender" value="Male" required>
			<label for="male">Male</label>
			<input type="radio" name="animalGender" value="Female">
			<label for="female">Female</label><br>
			</p>
			<p>
			<input type="text" name="animalColor" placeholder="Enter color" size="10" required/>
			</p>
		</td>
		<td class="labels">
			<p><label>Age:</label></p>
			<p><label>Breed:</label></p>
			<p><label>Disease/Sick: </label></p>
			<p><label>Rescuer:</label></p>			
		</td>
		<td>
				<p>
				<input type="number" name="animalAge" min="1" max="200" step="1" size="15" placeholder="Age" required/>
				</p>
				<p>
				
				<input type="text" name="animalBreeed" placeholder="Enter breed" size="10" required/>
				</p>
				<p>
				<select name="animalDiseased" placeholder="Enter disease">
				<?php while ($dis = mysqli_fetch_array($diseaseSql)) 
					echo "<option value='".$dis['disease_Id']."'>".$dis['disease_Id']."-".$dis['disease_name']."</option>"

					?>
				</select>
				</p>
				<p>
				
				<select name="rescuerId" placeholder="Enter rescuer id">
				<?php while ($res = mysqli_fetch_array($rescuerSql)) 
					echo "<option value='".$res['rescuer_id']."'>".$res['rescuer_id']."-".$res['rescuer_fname']."</option>"
					?>
				</select>
				</p>
		</td>
		<td class="labels">
			<p><label>Employee:</label></p>
			<p><label>Adopter:</label></p>
			<p><label>Rescue Date</label></p>
			<p><label>Profile Picture</label></p>
		</td>
		<td>
			<p>
			<select name="employeeId" placeholder="Enter employee id">
			<?php while ($emp = mysqli_fetch_array($employeeSql)) 
				echo "<option value='".$emp['employee_id']."'>".$emp['employee_id']."-".$emp['employee_fname']."</option>"
				?>
			</select>
			</p>
			<p>

			<select name="adopterId" placeholder="Enter adopter id">
			<option value=""></option>
			<?php while ($ado = mysqli_fetch_array($adopterSql)) 
				echo "<option value='".$ado['adopter_id']."'>".$ado['adopter_id']."-".$ado['adopter_fname']."</option>"
				?>
			</select><label class="guide">*leave it blank if none</label>
			</p>
			<p>

			<input type="date" name="rescueDate" placeholder="Enter rescue date " size="10" required/>
			</p>
			<p>

			<input type="file" name="fileToUpload" id="fileToUpload">
			</p>
	</td>
	
		
</table>
	<h3 class="btncreate"><input type="submit" name="animalCreate" value="CREATE"></h3>
	</form>

</div>


<div class="records">
<h3>ANIMAL RECORD</h3>	 
<?php 
if (isset($_SESSION['username'])) {
while($results = mysqli_fetch_array($sqlAccAnimal)){ ?>
<section>
 <table>
		<td class="picture">
		<?php echo "<img src='image/".$results['animal_picture']."' style='width: 200px; height: 200px' alt = 'animal_picture'>" ?>
		</td>
		<td class="labels">
			<p>ID: <?php echo $results['animal_id'] ?></p>
			<p>Name: <?php echo $results['animal_name'] ?></p>
			<p>Type: <?php echo $results['animal_type'] ?></p>
			<p>Gender: <?php echo $results['animal_gender'] ?></p>
			<p>Color: <?php echo $results['animal_color'] ?></p>
			<p>Age: <?php echo $results['animal_age'] ?></p>
		
		</td>
		<td class="labels">
			<p>Breed: <?php echo $results['animal_breed'] ?></p>
			<p>Sicknes: <?php echo $results['disease_name']?></p>
			<p>Rescuer Name: <?php echo "#".$results['rescuer_id']." ".$results['rescuer_fname'] ?></p>
			<p>Employee Name: <?php echo "#".$results['employee_id']." ".$results['employee_fname'] ?></p>
			<p>Adopter Name: <?php echo "#".$results['adopter_id']." ".$results['adopter_fname']?></p>
			<p>Rescue Date: <?php echo $results['rescue_date'] ?></p>
		</td>
</table>
			<h3>
				<form action="updateAnimal.php" method="get">
					<input type="hidden" name="editID" value="<?php echo $results['animal_id'] ?>">
					<input type="hidden" name="editName" value="<?php echo $results['animal_name'] ?>">
					<input type="hidden" name="editType" value="<?php echo $results['animal_type'] ?>">
					<input type="hidden" name="editGender" value="<?php echo $results['animal_gender'] ?>">
					<input type="hidden" name="editColor" value="<?php echo $results['animal_color'] ?>">
					<input type="hidden" name="editAge" value="<?php echo $results['animal_age'] ?>">
					<input type="hidden" name="editBreed" value="<?php echo $results['animal_breed'] ?>">
					<input type="hidden" name="editDis" value="<?php echo $results['disease_name'] ?>">
					<input type="hidden" name="editRescue" value="<?php echo $results['rescuer_id'] ?>">
					<input type="hidden" name="editEmploy" value="<?php echo $results['employee_id'] ?>">
					<input type="hidden" name="editAdopt" value="<?php echo $results['adopter_id'] ?>">
					<input type="hidden" name="editDate" value="<?php echo $results['rescue_date'] ?>">
					<input type="hidden" name="editPic" value="	<?php echo "<img src='image/".$results['animal_picture']."' style='width: 100px; height: 100px' alt='Animal_image'>" ?>">

					<input type="hidden" name="editPicName" value="	<?php echo  $results['animal_picture'] ?>" >

					<input type="submit" name="edit" value="EDIT" style="width: 80px">
				</form>
				<form action="deleteAnimal.php" method="get">
					<input type="hidden" name="deleteID" value="<?php echo $results['animal_id']?>">
					<input type="hidden" name="deleteName" value="<?php echo $results['animal_name'] ?>">
					<input type="submit" name="deleteAnimal" value="DELETE" style="width: 80px">
				</form>
			</h3>
		<div class="line"></div>
</section>

<?php 

}
}
else{
	echo '<script>window.location.href = "login.php"</script>';
}
?>
</div>


<footer>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>



     
</body>
</html>
