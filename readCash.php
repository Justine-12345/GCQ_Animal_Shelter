<?php  

require('includes/config.php');

$cashQuery = "SELECT * FROM donation";
$cashSql = mysqli_query($conn, $cashQuery);

?>