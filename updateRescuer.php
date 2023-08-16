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
	<title>Rescuers | Edit</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul>
	    			<li>
	   					<form action="CrudRescuer.php" method="post">
	    				<input type="submit" name="back" value="Back"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	    			
	    		</ul>
	    	</nav>
	    </div>
     </header>

<div class="create">
   <h3><?php echo $_GET['editPic'];  ?> </h3>
   <h3>EDIT RESCUER # <?php echo " ".$_GET['editID']." ". $_GET['editFname']." ".$_GET['editLname'] ?></h3>	
	<form  action="#" method="post" enctype="multipart/form-data">
		<table>
			<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
			<p><label>Gender:</label></p>
			<p><label>Age:</label></p>
			</td>
			<td>
				<p><input type="text" name="rescuerFnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editFname']?>" required/></p>
				<p><input type="text" name="rescuerLnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editLname']?>" required/></p>
				<p>
				<input type="radio" name="rescuerGenderU" value="Male" required>
				<label for="male">Male</label>
				<input type="radio" name="rescuerGenderU" value="Female">
				<label for="female">Female</label>
				<label style="font-style: italic; color: gray; font-size: 12px">(*Value before:<?php echo $_GET['editGender']; ?>)</label>
				</p>
				<p><input type="number" name="rescuerAgeU" min="18" max="200" step="1" size="15" placeholder="Age" value="<?php echo $_GET['editAge']?>" required/></p>
			</td>
			<td class="labels">
				<p><label>Contact No:</label></p>
				<p><label>Address:</label></p>
				<p><label>Profile Picture:</label></p>
				<p><label>    </label></p>
			</td>	
			<td>
				<p><input type="text" name="rescuerContactU" placeholder="Enter rescuer id " size="10" value="<?php echo $_GET['editContact']?>" required/></p>
				<p><input type="text" name="rescuerAdressU"d placeholder="Enter employee id " size="15" value="<?php echo $_GET['editAddress']?>" required/></p>
				<p><input type="file" name="fileToUploadU" id="fileToUpload"></p>
				<p><label>    </label></p>
			</td>
		</table>
	<h3 class="btncreate"><input type="submit" name="rescuerUpdate" value="UPDATE"></h3>
	</form>

<?php
if(isset($_SESSION['username'])){
if (isset($_POST['rescuerUpdate'])) {
$target_dir = "image/";
$target_file = $target_dir.basename($_FILES['fileToUploadU']['name']);
$animalRescuer = $_FILES['fileToUploadU']['name'];

$rescuerFname = mysqli_real_escape_string($conn, $_POST['rescuerFnameU']);
$rescuerLname = mysqli_real_escape_string($conn, $_POST['rescuerLnameU']);
$rescuerGender = mysqli_real_escape_string($conn, $_POST['rescuerGenderU']);
$rescuerAge = mysqli_real_escape_string($conn,$_POST['rescuerAgeU']);
$rescuerContact = mysqli_real_escape_string($conn,$_POST['rescuerContactU']);
$rescuerAdress = mysqli_real_escape_string($conn,$_POST['rescuerAdressU']);
$queryUpdate = "";
if (empty($_FILES['fileToUploadU']['name'])) {
	$queryUpdate = "UPDATE rescuer SET rescuer_fname = '".$rescuerFname."', rescuer_lname = '".$rescuerLname."', rescuer_age =  '".$rescuerAge."',  rescuer_gender = '".$rescuerGender."',  rescuer_contact = '".$rescuerContact."',  rescuer_address = '".$rescuerAdress."' WHERE rescuer_id =  '".$_GET['editID']."'";
echo '<script>alert("Succesfully Updated #ID'.$_GET['editID'].'")</script>';
echo '<script>window.location.href = "CrudRescuer.php"</script>';
}
else{
	$queryUpdate = "UPDATE rescuer SET rescuer_picture = '".$animalRescuer."',rescuer_fname = '".$rescuerFname."', rescuer_lname = '".$rescuerLname."', rescuer_age =  '".$rescuerAge."',  rescuer_gender = '".$rescuerGender."',  rescuer_contact = '".$rescuerContact."',  rescuer_address = '".$rescuerAdress."' WHERE rescuer_id =  '".$_GET['editID']."'";
 //Diseased
if (move_uploaded_file($_FILES['fileToUploadU']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "Error to upload file";
	}

	echo '<script>alert("Succesfully Updated #ID '.$_GET['editID'].'")</script>';
	echo '<script>window.location.href = "CrudRescuer.php"</script>';
}
mysqli_query($conn, $queryUpdate);
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
