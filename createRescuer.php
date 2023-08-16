<?php  

session_start();
require ('includes/config.php');

if(isset($_SESSION['username'])){
if (isset($_POST['rescuerCreate'])) {

$target_dir = "image/";
$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
$rescuerPicture = $_FILES['fileToUpload']['name'];

$rescuerFname = mysqli_real_escape_string($conn, $_POST['rescuerFname']);
$rescuerLname = mysqli_real_escape_string($conn, $_POST['rescuerLname']);
$rescuerGender = mysqli_real_escape_string($conn, $_POST['rescuerGender']);
$rescuerAge = mysqli_real_escape_string($conn,$_POST['rescuerAge']);
$rescuerContact = mysqli_real_escape_string($conn,$_POST['rescuerContact']);
$rescuerAdress = mysqli_real_escape_string($conn,$_POST['rescuerAdress']);

$queryCreate = "INSERT INTO rescuer (rescuer_picture, rescuer_fname, rescuer_lname, rescuer_age,  rescuer_gender,  rescuer_contact,  rescuer_address) VALUES ('".$rescuerPicture."','".$rescuerFname."', '".$rescuerLname."', '".$rescuerAge."', '".$rescuerGender."','".$rescuerContact."','".$rescuerAdress."')";

	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "Error to upload file";
	}

$sqlCreat = mysqli_query($conn, $queryCreate);

echo '<script>alert("Succesfully inserted")</script>';
echo '<script>window.location.href = "CrudRescuer.php"</script>';

}
else{
	echo '<script>window.location.href = "CrudRescuer.php"</script>';
}
}
?>