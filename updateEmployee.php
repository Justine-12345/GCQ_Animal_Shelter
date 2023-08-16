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
	<title>Employee | Edit</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul>
	    			<li>
	   					<form action="CrudEmployee.php" method="post">
	    				<input type="submit" name="back" value="Back"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	    			
	    		</ul>
	    	</nav>
	    </div>
     </header>



<div class="create">
   <h3><?php echo $_GET['editPic'];  ?>  </h3>
   <h3>EDIT EMPLOYEE # <?php echo " ".$_GET['editID']." ". $_GET['editFname']." ".$_GET['editLname'] ?></h3>	
	<form  action="#" method="post" enctype="multipart/form-data">
	<table>
		<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
			<p><label>Job Description:</label></p>
			<p><label>Gender:</label></p>
		</td>	
		<td>
			<p><input type="text" name="employeeFnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editFname']?>" required/></p>
			<p><input type="text" name="employeeLnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editLname']?>" required/></p>
			<p><input type="text" name="employeeDescU" placeholder="Enter Description" size="15" value="<?php echo $_GET['editDesc']?>" required/></p>
			<p>
			<input type="radio" name="employeeGenderU" value="Male" required>
			<label for="male">Male</label>
			<input type="radio" name="employeeGenderU" value="Female">
			<label for="female">Female</label>
			<label style="font-style: italic; color: gray; font-size: 12px">(*Value before:<?php echo $_GET['editGender']; ?>)</label>
			</p>
		</td>
		<td class="labels">
				<p><label>Age:</label></p>
				<p><label>Contact No:</label></p>
				<p><label>Address:</label></p>
				<p><label>Profile Picture:</label></p>
		</td>
		<td>
			<p><input type="number" name="employeeAgeU" min="18" max="200" step="1" size="15" placeholder="Age" value="<?php echo $_GET['editAge']?>" required/></p>
			
			<p><input type="text" name="employeeContactU" placeholder="Enter rescuer id " size="10" value="<?php echo $_GET['editContact']?>" required/></p>
			<p><input type="text" name="employeeAdressU"d placeholder="Enter employee id " size="15" value="<?php echo $_GET['editAddress']?>" required/></p>
			<p><input type="file" name="fileToUploadU" id="fileToUpload"></p>
		</td>
	</table>
	<h3 class="btncreate"><input type="submit" name="employeeUpdate" value="UPDATE"><h3>
	</form>


<?php
if(isset($_SESSION['username'])){
if (isset($_POST['employeeUpdate'])) {

$target_dir = "image/";
$target_file = $target_dir.basename($_FILES['fileToUploadU']['name']);
$employeePicture = $_FILES['fileToUploadU']['name'];

$employeeDesc = mysqli_real_escape_string($conn, $_POST['employeeDescU']);
$employeeFname = mysqli_real_escape_string($conn, $_POST['employeeFnameU']);
$employeeLname = mysqli_real_escape_string($conn, $_POST['employeeLnameU']);
$employeeGender = mysqli_real_escape_string($conn, $_POST['employeeGenderU']);
$employeeAge = mysqli_real_escape_string($conn,$_POST['employeeAgeU']);
$employeeContact = mysqli_real_escape_string($conn,$_POST['employeeContactU']);
$employeeAdress = mysqli_real_escape_string($conn,$_POST['employeeAdressU']);

$queryUpdate = "";

if (empty($_FILES['fileToUploadU']['name'])) {

	$queryUpdate = "UPDATE employee SET employee_desc = '".$employeeDesc."' ,employee_fname = '".$employeeFname."', employee_lname = '".$employeeLname."', employee_age =  '".$employeeAge."',  employee_gender = '".$employeeGender."',  employee_contact = '".$employeeContact."',  employee_address = '".$employeeAdress."' WHERE employee_id =  '".$_GET['editID']."'";
echo '<script>alert("Succesfully Updated #ID'.$_GET['editID'].'")</script>';
echo '<script>window.location.href = "CrudEmployee.php"</script>';
}
else{
	$queryUpdate = "UPDATE employee SET employee_picture = '".$employeePicture."', employee_desc = '".$employeeDesc."' ,employee_fname = '".$employeeFname."', employee_lname = '".$employeeLname."', employee_age =  '".$employeeAge."',  employee_gender = '".$employeeGender."',  employee_contact = '".$employeeContact."',  employee_address = '".$employeeAdress."' WHERE employee_id =  '".$_GET['editID']."'";

if (move_uploaded_file($_FILES['fileToUploadU']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "Error to upload file";
	}
	echo '<script>alert("Succesfully Updated #ID'.$_GET['editID'].'")</script>';
	echo '<script>window.location.href = "CrudEmployee.php"</script>';
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
