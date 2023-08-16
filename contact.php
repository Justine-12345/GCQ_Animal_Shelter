<?php  
include ('homeAnimal.php');
include ('readDisease.php');
include ('readAdopter.php');
include ('readEmployee.php');
include ('readRescuer.php');
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
			margin-left: auto;
			margin-right: auto;
		}

		.records table{
			border: 2px solid #0080FF77;
			background-color: #2b58ab;
			box-shadow: gray 2px 2px 3px; }
			
		.create {
			position: static;
			margin: 30px; 
			padding-top: 30px;
			padding-bottom: : 30px;
			background-color: #0080FF77;
			border-radius: 10px;
			border: 10px dashed orange; 
			color: white;
			font-weight: 900;
		}
		#mainHeader{
			border-bottom: 10px solid orange;
		}
		.btncreate input {
			padding-left: 30px; 
			padding-right: 30px;
			background-color: brown;
			color:white;
			font-weight: 900;
			margin-left: 30px;
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
		}

		.line{
			background-color: orange;
			height: 1px;
			margin-top: 30px;
			margin-bottom: 30px;
			margin-left: 100px;
			margin-right: 100px;
		}

		.guide{
			margin-left: 5px;
			font-size: 8;
			font-weight: 300;
			font-style: italic;
		}
		
		.records th {
			color: #FFEF00 ;
			text-shadow: gray 1px 1px 3px;
		}	

	</style>
	<title>Home | Welcome</title>
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

<div class="records">
<h3 style="font-weight: 900; font-size: 50px">CONTACT US</h3>	 
<section>
 <table>
		<td class="labels">
			<p>Email:</p>
			<p>Cellphone no:</p>
			<p>Address:</p>
			<p>Tell No:</p>
		
		</td>
		<td class="labels"  style="padding-right: 100px">
			<p> castanedajustine09@gmail.com</p>
			<p> 0912345678 (smart)</p>
			<p> Brgy.Pinagsama Taguig City</p>
			<p>344-4655</p>
		</td>
</table>
		<div class="line"></div>

<h3 style="margin-bottom: 20px">MAP</h3>
<h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d320.9769526151374!2d121.05638898268981!3d14.525142768901743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8b7d7e80fd3%3A0xe539fc07d8351de2!2sPinagsama%2C%20Taguig%2C%20Metro%20Manila!5e1!3m2!1sen!2sph!4v1610982424229!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></h3>


</section>
</div>
<footer style=" bottom: 0px; width: 100%">
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
     
</body>
</html>
