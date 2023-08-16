<?php  
	session_start();

	if (isset($_POST['logout'])) {
		session_destroy();
		echo '<script>window.location.href = "login.php"</script>';
	}else{
		echo '<script>alert("Unable to Log-out")</script>'; 
	}



?>