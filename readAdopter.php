<?php  

require('includes/config.php');

$adopterQuery = "SELECT * FROM adopter";
$adopterSql = mysqli_query($conn, $adopterQuery);

?>