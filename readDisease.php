<?php  

require('includes/config.php');

$diseaseQuery = "SELECT * FROM disease";
$diseaseSql = mysqli_query($conn, $diseaseQuery);

?>