<?php
session_start();
require ('includes/config.php');
include ('readAnimal.php');
include ('readDisease.php');
include ('readAdopter.php');
include ('readEmployee.php');
include ('readRescuer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="img/jpg" href="image/logo.png">

	<style>
		.labels{
			padding-left: 50px;
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
			color: white;
			font-weight: 900;
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
	<title>Animals | Edit</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul>
	    			
	    			<li>
	   					<form action="CrudAnimal.php" method="post">
	    				<input type="submit" name="back" value="Back"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	    			
	    		</ul>
	    	</nav>
	    </div>
     </header>

<div class="create">
	<h3>
   <?php echo $_GET['editPic'];  ?>  
</h3>
   <h3>EDIT ANIMAL #<?php echo $_GET['editID']." ". $_GET['editName']  ?></h3>	
	<form  action="#" method="post" enctype="multipart/form-data">
<table>
		<td>
			<p><label>Name:</label></p>
			<p><label>Type:</label></p>
			<p><label>Gender:</label></p>
			<p><label>Color:</label></p>
		</td>	
		<td>
			<p><input type="text" name="animalNameU" placeholder="Enter names" size="10" value="<?php echo $_GET['editName']?>" required/></p>
			<p>
			<input type="radio" name="animalTypeU" value="Dog" required>
			<label for="dog">Dog</label>
			<input type="radio" name="animalTypeU" value="Cat">
			<label for="cat">Cat</label>
			<label style="font-style: italic; color: gray; font-size: 12px">(*Value before:<?php echo $_GET['editType']; ?>)</label>
			</p>
			<p>
			<input type="radio" name="animalGenderU" value="Male" required>
			<label for="male">Male</label>
			<input type="radio" name="animalGenderU" value="Female">
			<label for="female">Female</label>
			<label style="font-style: italic; color: gray; font-size: 12px">(*Value before:<?php echo $_GET['editGender']; ?>)</label>
			</p>
			<p>
			<input type="text" name="animalColorU" placeholder="Enter color" size="10" value="<?php echo $_GET['editColor']?>" required/></p>
		</td>
		<td class="labels">
			<p><label>Age:</label></p>
			<p><label>Breed:</label></p>
			<p><label>Disease/Sick: </label></p>
			<p><label>Rescuer:</label></p>			
		</td>
		<td>
			<p>
			<input type="number" name="animalAgeU" min="1" max="200" step="1" size="15" placeholder="Age" value="<?php echo $_GET['editAge']?>" required/></p>


			<p>
			<input type="text" name="animalBreeedU" placeholder="Enter breed" size="10" value="<?php echo $_GET['editBreed']?>" required/></p>

			<p>
			<select name="animalDiseasedU" placeholder="Enter disease" required>
			<?php while ($dis = mysqli_fetch_array($diseaseSql)) 
				echo "<option value='".$dis['disease_Id']."'>".$dis['disease_Id']."-".$dis['disease_name']."</option>"
			?>
			</select><label style="font-style: italic; color: gray; font-size: 12px">(*Value before:<?php echo $_GET['editDis']; ?>)</label>
			</p>
			<p>
			<select name="rescuerIdU" placeholder="Enter rescuer id" value="<?php echo $_GET['editRescue']?>" required>
				<option value="<?php echo $_GET['editRescue']?>">Current-<?php echo $_GET['editRescue']?></option>
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
			<select name="employeeIdU" placeholder="Enter employee id">
				<option value="<?php echo $_GET['editEmploy']?>">Current-<?php echo $_GET['editEmploy']?></option>
			<?php while ($emp = mysqli_fetch_array($employeeSql)) 
				echo "<option value='".$emp['employee_id']."'>".$emp['employee_id']."-".$emp['employee_fname']."</option>"
				?>
			</select>
			</p>
			<p>

			<select name="adopterIdU" placeholder="Enter adopter id">
			<option value="<?php echo $_GET['editAdopt']?>">Current-<?php echo $_GET['editAdopt']?></option>
			<?php while ($ado = mysqli_fetch_array($adopterSql)) 
				echo "<option value='".$ado['adopter_id']."'>".$ado['adopter_id']."-".$ado['adopter_fname']."</option>"
				?>
			</select><label class="guide">*0 if none</label>
			</p>
			<p>

			<input type="date" name="rescueDateU" placeholder="Enter rescue date " size="10" value="<?php echo $_GET['editDate']?>" required/>
			</p>
			<p>

			<input type="file" name="fileToUploadU" id="fileToUpload"  value="<?php echo $_GET['editPicName'] ?>">
			</p>
		</td>
</table>
	<h3 class="btncreate">
	<input type="submit" name="animalUpdate" value="UPDATE">
	<h3>
</form>
<?php

if(isset($_SESSION['username'])){
if (isset($_POST['animalUpdate'])) {



$target_dir = "image/";
$target_file = $target_dir.basename($_FILES['fileToUploadU']['name']);
$animalPicture = $_FILES['fileToUploadU']['name'];

$animalName = mysqli_real_escape_string($conn, $_POST['animalNameU']);
$animalType = mysqli_real_escape_string($conn, $_POST['animalTypeU']);
$animalGender = mysqli_real_escape_string($conn, $_POST['animalGenderU']);
$animalColor = mysqli_real_escape_string($conn,$_POST['animalColorU']);
$animalAge = mysqli_real_escape_string($conn,$_POST['animalAgeU']);
$animalBreeed = mysqli_real_escape_string($conn,$_POST['animalBreeedU']);
$rescuerId = mysqli_real_escape_string($conn,$_POST['rescuerIdU']);
$employeeId = mysqli_real_escape_string($conn,$_POST['employeeIdU']);
$adopterId = mysqli_real_escape_string($conn,$_POST['adopterIdU']);
$rescueDate = mysqli_real_escape_string($conn,$_POST['rescueDateU']);
$animalDiseased = mysqli_real_escape_string($conn,$_POST['animalDiseasedU']);

$queryUpdate = "";

if (empty($_FILES['fileToUploadU']['name'])) {
	$queryUpdate = "UPDATE animal SET animal_name = '".$animalName."',animal_type = '".$animalType."', animal_gender = '".$animalGender."', animal_color = '".$animalColor."', animal_age = '".$animalAge."', animal_breed = '".$animalBreeed."', rescuer_id = '".$rescuerId."', employee_id = '".$employeeId."', adopter_id = '".$adopterId ."', rescue_date = '".$rescueDate."' WHERE animal_id = '".$_GET['editID']."'";
}
else{

$queryUpdate = "UPDATE animal SET animal_picture = '".$animalPicture."', animal_name = '".$animalName."',animal_type = '".$animalType."', animal_gender = '".$animalGender."', animal_color = '".$animalColor."', animal_age = '".$animalAge."', animal_breed = '".$animalBreeed."', rescuer_id = '".$rescuerId."', employee_id = '".$employeeId."', adopter_id = '".$adopterId ."', rescue_date = '".$rescueDate."' WHERE animal_id = '".$_GET['editID']."'";

if (move_uploaded_file($_FILES['fileToUploadU']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "Error to upload file";
	}
}

if(mysqli_query($conn, $queryUpdate)){
$queryDiseased = "UPDATE diseased SET disease_Id = '".$animalDiseased."' , animal_Id = '".$_GET['editID']."' WHERE animal_id = '".$_GET['editID']."'";

$sqlDiseased = mysqli_query($conn, $queryDiseased);
}else
{
	echo "Error getting animal Last Id";
}
echo '<script>alert("Succesfully Updated #ID '.$_GET['editID'].'")</script>';
echo '<script>window.location.href = "CrudAnimal.php"</script>';
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
