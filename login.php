<?php  
session_start();
?>
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
	<title>Log-in | Welcome</title>
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

     <div class="create">
     	
     		<h2 class="titles">Log-in</h2>
     		<p class="titles">For Authorize Person Only</p>
     	

     		<form action="#" method="post" >
     			<table>
     				<td>
     					<p>Username: </p>
     					<p>Password: </p>
     				</td>
     				<td>
     					<p><input type="text" name="username" placeholder="Enter Username" required></p>
     					<p><input type="password" name="password" placeholder="Enter password" required></p>
     				</td>
     			</table>
     			<h3 class="btncreate">
     			<input type="submit" name="submit" value="Log-in"></h3>
     		</form>
     		<?php

				if(isset($_POST['submit']))
				{
				require ('includes/config.php');
			
				 $my_user = $_POST['username'];
				 $my_passpar = $_POST['password'];
				 $my_pass = sha1($my_passpar);

      			$loginQuery = "SELECT * FROM users WHERE email = '$my_user' AND pass = '$my_pass'";
      			$loginSql = mysqli_query($conn, $loginQuery);

      				if(mysqli_num_rows($loginSql) == 0) {
      				if (empty($loginSql)) {
					echo "<pstyle='color: red'>No Acount Exist, Be First?</p>";
					}
					echo "<p style='color: red'>Wrong Username or Password, Try Again</p>";
					}
					else
					{
					while($results = mysqli_fetch_array($loginSql)){

					$_SESSION['username'] = $results['email'];
					$_SESSION['first_name'] = $results['first_name'];
					$_SESSION['last_name'] = $results['last_name'];
					}
					echo '<script>window.location.href = "adminPanel.php"</script>';
					}
				}?>
     		 <p style="text-align: center">
     		 	<a href="signup.php" style="color: blue; margin-bottom: 10px">Sign-up</a>
     		 </p>
     </div>

<footer style="position: absolute; bottom: 0px; width: 100%"><div>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
</body>
</html>