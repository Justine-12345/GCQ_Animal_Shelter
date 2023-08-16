<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="img/jpg" href="image/logo.png">

	<style>
		.labels{
			padding-left: 100px;
		}
		.create h3{
			text-align: center;
		}
		.create table {
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
		}

		.records table{
			border: 2px solid #0080FF77;
			background-color: #2b58ab;
			box-shadow: gray 2px 2px 3px; }

		.create {
			margin-top: 30px;
			margin-bottom: 30px;
			position: static;
			margin-right: auto;
			margin-left: auto; 
			padding-top: 30px;
			padding-bottom: : 300px;
			background-color: #0080FF77;
			border-radius: 10px;
			border: 10px dashed orange; 
			color: white;
			font-weight: 900;
			width: 600px;
		}
		#mainHeader{
			border-bottom: 10px solid orange;
		}
	.btncreate input {
			margin: 30px;
			padding-left: 30px; 
			padding-right: 30px;
			background-color: #0034FF77;
			font-weight: 900;
			color: white;
		}
		.records h3{
			text-align: center;
			margin-bottom: 50px;
		}
		.records {
			position: static;
			margin: 30px; 
			padding-top: 30px;
			padding-bottom: : 30px;
			background-color: #0080FF77;
			border-radius: 10px;
			border: 10px dashed orange; 
			color: white;
			font-weight: 900;}
		.records table {
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 30px;
		}

		.records th {
			width: 100px;
		}

		.records td {
			text-align: center;
		}
		.titles{
			text-align: center;
		}

		.line{
			background-color: orange;
			height: 1px;
			margin-top: 30px;
			margin-bottom: 30px;
			margin-left: 100px;
			margin-right: 100px;
		}

		.records th {
			color: #FFEF00 ;
			text-shadow: gray 1px 1px 3px;
			width: 300px;
		}
	</style>
	<title>Sign-up! | Welcome</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul style="color: white;text-shadow: none;">
	    			<li><a href="main.php" style="color: white">Home</a></li>
	    			<li><a href="about.php" style="color: white">About</a></li>
	    			<li><a href="contact.php" style="color: white">Contact Us</a></li>
	    			<li><a href="login.php" style="color: white">Log-in</a></li>
	    		</ul>
	    	</nav>
	    </div>
     </header>

     <div>
     	<?php  
     		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     			require('includes/config.php');
     			$errors = array();

     			if (empty($_POST['first_name'])) {
     				$errors[] = 'You forgot to enter your first name.';
     			}
     			else{
     				$fn = mysqli_real_escape_string($conn, trim($_POST['first_name']));
     			}

     			if (empty($_POST['last_name'])) {
					 $errors[] = 'You forgot to enter your last name.';
					 } else {
					 $ln = mysqli_real_escape_string($conn, trim($_POST['last_name']));
					 }
					
				if (empty($_POST['email'])) {
					 $errors[] = 'You forgot to enter your email address.';
					 } else {
					 $e = mysqli_real_escape_string($conn, trim($_POST['email']));
 					}

 				if (!empty($_POST['pass1'])) {
					 if ($_POST['pass1'] != $_POST['pass2']) {
					 $errors[] = 'Your password did not match the confirmed password.';
					 } else {
					 $p = mysqli_real_escape_string($conn, trim($_POST['pass1']));
					 }
					 } else {
					 $errors[] = 'You forgot to enter your password.';
					 }


					 $userQuery = "SELECT email FROM users WHERE email='".$e."'";
					 $sqlUser = mysqli_query($conn, $userQuery);
							 	
					 	if (mysqli_num_rows( $sqlUser) != 0) {
					 		 echo "Username already exists";
					 	}

					 	else{

								 if (empty($errors)) {
								 $q = "INSERT INTO users (first_name, last_name, email, pass) VALUES ('$fn', '$ln', '$e', SHA1('$p'))"; 
								 $r = @mysqli_query ($conn, $q); // Run the query.
								 if ($r) { 
								 echo '<h1>Thank you!</h1>
								 <p>You are now registered. You will actually be able to log in! <a href="login.php"><input type="submit" value="Log-in"></a> </p>'; 
								

								 } 
								 else { 
								 echo '<h1>System Error</h1>
								 <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
								 echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
								 }
			     				 }
					 	}




     				 mysqli_close($conn); 
     			}
     	?>

     	<div class="create">
     	<h3>Sign-up</h3>
			<form action="#" method="post">
				<table>
					<td>
						<p>First Name: </p>
						<p>Last Name:</p> 
						<p>User: </p>
						<p>Password: </p>
						<p>Confirm Password: </p>
					</td>
					<td>				
						 <p><input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
						<p> <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
						<p> <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
						 <p><input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
						<p> <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
					</td>
				</table>



			 <h3 class="btncreate"><input type="submit" name="signup" value="Register" /></h3>
			</form>
		</div>



     </div>


<footer style="position: absolute; bottom: 0px; width: 100%"><div>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
</body>
</html>