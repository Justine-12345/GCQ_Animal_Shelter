<?php  

require('includes/config.php');

$employeeQuery = "SELECT * FROM employee";
$employeeSql = mysqli_query($conn, $employeeQuery);

?>