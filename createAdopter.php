<?php
session_start();
require ('includes/config.php');

if(isset($_SESSION['username'])){
if (isset($_POST['adopterCreate'])) {

$adopterFname = mysqli_real_escape_string($conn, $_POST['adopterFname']);
$adopterLname = mysqli_real_escape_string($conn, $_POST['adopterLname']);
$adopterContact = mysqli_real_escape_string($conn, $_POST['adopterContact']);
$adopterAddress = mysqli_real_escape_string($conn,$_POST['adopterAddress']);


	$queryInsert = "INSERT INTO adopter( adopter_fname, adopter_lname, adopter_contact, adopter_address) VALUES ('".$adopterFname."' ,'".$adopterLname ."','".$adopterContact."','".$adopterAddress."')";
		
	mysqli_query($conn, $queryInsert);

echo '<script>alert("Succesfully Inserted")</script>';
echo '<script>window.location.href = "CrudAdopter.php"</script>';

}
}

?>
