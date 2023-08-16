<?php
session_start();
require ('includes/config.php');
if(isset($_SESSION['username'])){
if (isset($_POST['diseaseCreate'])) {

$diseaseName = mysqli_real_escape_string($conn, $_POST['diseaseName']);
$diseaseDesc = mysqli_real_escape_string($conn, $_POST['diseaseDesc']);
$queryCreate = "";
	$queryCreate = "INSERT INTO disease (disease_name , disease_desc) VALUES ('".$diseaseName."','".$diseaseDesc."')";
	mysqli_query($conn, $queryCreate);
echo '<script>alert("Succesfully Inserted")</script>';
echo '<script>window.location.href = "CrudDisease.php"</script>';
}
}
?>
<footer>
	<div>
		Meowers &copy; copyright 2019
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat.</p>
	</div>
</footer>  
</body>
</html>
