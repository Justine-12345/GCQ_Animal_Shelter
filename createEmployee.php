<?php  
session_start();
require ('includes/config.php');
if(isset($_SESSION['username'])){
if (isset($_POST['employeeCreate'])) {
$target_dir = "image/";
$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
$employeePicture = $_FILES['fileToUpload']['name'];
$employeeDesc = mysqli_real_escape_string($conn, $_POST['employeeDesc']);
$employeeFname = mysqli_real_escape_string($conn, $_POST['employeeFname']);
$employeeLname = mysqli_real_escape_string($conn, $_POST['employeeLname']);
$employeeGender = mysqli_real_escape_string($conn, $_POST['employeeGender']);
$employeeAge = mysqli_real_escape_string($conn,$_POST['employeeAge']);
$employeeContact = mysqli_real_escape_string($conn,$_POST['employeeContact']);
$employeeAdress = mysqli_real_escape_string($conn,$_POST['employeeAdress']);
$queryCreate = "INSERT INTO employee (employee_picture, employee_desc, employee_fname, employee_lname, employee_age,  employee_gender,  employee_contact,  employee_address) VALUES ('".$employeePicture."','".$employeeDesc."', '".$employeeFname."', '".$employeeLname."', '".$employeeAge."','".$employeeGender."','".$employeeContact."','".$employeeAdress."')";
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "Error to upload file";
	}
$sqlCreat = mysqli_query($conn, $queryCreate);

echo '<script>alert("Succesfully inserted")</script>';
echo '<script>window.location.href = "CrudEmployee.php"</script>';
}
else{
	echo '<script>window.location.href = "CrudEmployee.php"</script>';
}
}
?>