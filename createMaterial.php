<?php
session_start();
require ('includes/config.php');
if(isset($_SESSION['username'])){
if (isset($_POST['materialCreate'])) {
$materialFname = mysqli_real_escape_string($conn, $_POST['materialFname']);
$materialLname = mysqli_real_escape_string($conn, $_POST['materialLname']);
$materialType = mysqli_real_escape_string($conn, $_POST['materialType']);
$materialDate = mysqli_real_escape_string($conn,$_POST['materialDate']);
$queryCreate = "";
	$queryCreate = "INSERT INTO donation1 ( donation1_fname, donation1_lname, donation1_type, donation1_date) VALUES ('".$materialFname."','".$materialLname."','".$materialType."','".$materialDate."')";
mysqli_query($conn, $queryCreate);
echo '<script>alert("Succesfully Inserted")</script>';
echo '<script>window.location.href = "CrudMaterial.php"</script>';
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
