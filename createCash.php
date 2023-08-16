<?php
session_start();
require ('includes/config.php');
if(isset($_SESSION['username'])){
if (isset($_POST['cashCreate'])) {

$cashFname = mysqli_real_escape_string($conn, $_POST['cashFname']);
$cashLname = mysqli_real_escape_string($conn, $_POST['cashLname']);
$cashAmount = mysqli_real_escape_string($conn, $_POST['cashAmount']);
$cashMethod = mysqli_real_escape_string($conn,$_POST['cashMethod']);
$cashDate = mysqli_real_escape_string($conn,$_POST['cashDate']);

$queryUpdate = "";

	$queryUpdate = "INSERT INTO donation( donation_fname, donation_lname, donation_amount, donation_date, donation_method) VALUES ('".$cashFname."' ,'".$cashLname ."','".$cashAmount."','".$cashDate."','".$cashMethod."')";
		
	mysqli_query($conn, $queryUpdate);

echo '<script>alert("Succesfully Inserted")</script>';
echo '<script>window.location.href = "CrudCash.php"</script>';

}
}

?>
