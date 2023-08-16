<?php
require ('includes/config.php');

$animalAccQuery = "SELECT animal.*, disease.disease_name, rescuer.rescuer_fname, employee.employee_fname, adopter.adopter_fname
     			 FROM diseased, disease, animal
    			 LEFT JOIN rescuer ON animal.rescuer_id = rescuer.rescuer_id
    			 LEFT JOIN employee ON animal.employee_id = employee.employee_id
				 LEFT JOIN adopter ON animal.adopter_id = adopter.adopter_id
				 WHERE animal.animal_id = diseased.animal_id AND diseased.disease_id = disease.disease_id AND animal.adopter_id = 0  AND disease.disease_name = 'None' ORDER BY animal.animal_Id";
$sqlAccAnimal = mysqli_query($conn,$animalAccQuery);
if (!$sqlAccAnimal) {
    printf("Error occur: %s\n", mysqli_error($conn));
    exit();
}
?>