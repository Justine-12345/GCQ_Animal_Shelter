<?php  
session_start();
require ('includes/config.php');

if(isset($_SESSION['username'])){
if (isset($_POST['animalCreate'])) {

$target_dir = "image/";
$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
$animalPicture = $_FILES['fileToUpload']['name'];

$animalName = mysqli_real_escape_string($conn, $_POST['animalName']);
$animalType = mysqli_real_escape_string($conn, $_POST['animalType']);
$animalGender = mysqli_real_escape_string($conn, $_POST['animalGender']);
$animalColor = mysqli_real_escape_string($conn,$_POST['animalColor']);
$animalAge = mysqli_real_escape_string($conn,$_POST['animalAge']);
$animalBreeed = mysqli_real_escape_string($conn,$_POST['animalBreeed']);
$rescuerId = mysqli_real_escape_string($conn,$_POST['rescuerId']);
$employeeId = mysqli_real_escape_string($conn,$_POST['employeeId']);
$adopterId = mysqli_real_escape_string($conn,$_POST['adopterId']);
$rescueDate = mysqli_real_escape_string($conn,$_POST['rescueDate']);
$animalDiseased = mysqli_real_escape_string($conn,$_POST['animalDiseased']);

$queryCreate = "INSERT INTO animal(animal_picture, animal_name, animal_type, animal_gender, animal_color, animal_age, animal_breed, rescuer_id, employee_id, adopter_id, rescue_date) VALUES ('".$animalPicture."','".$animalName."', '".$animalType."', '".$animalGender."', '".$animalColor."','".$animalAge."','".$animalBreeed."','".$rescuerId."','".$employeeId."','".$adopterId ."','".$rescueDate."')";


	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "Error to upload file";
	}

//Diseased
if(mysqli_query($conn, $queryCreate)){
$last_id = mysqli_insert_id($conn);

$queryDiseased = "INSERT INTO diseased(disease_Id, animal_Id) VALUES ('".$animalDiseased."','".$last_id."')";
$sqlDiseased = mysqli_query($conn, $queryDiseased);
}else
{
	echo "Error getting animal Last Id";
}
echo '<script>alert("Succesfully inserted")</script>';
echo '<script>window.location.href = "CrudAnimal.php"</script>';
}
else{
	echo '<script>window.location.href = "CrudAnimal.php"</script>';
}
}
?>