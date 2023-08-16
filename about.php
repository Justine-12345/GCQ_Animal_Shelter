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
<h3 style="font-weight: 900; font-size: 50px">ABOUT US</h3>	 
<section>
 <table>
		<td class="labels" style="width: 500px; padding: 30px; text-align: center">
			<p>
				GCQ animal shelter is a non profit organization that rescues stray dogs and cats. the shelter records the animal's breed, gender, approximate age and other relevant information. We also checked for diseases or injuries by volunteer veterinarians. once these strays are rehabilitated, they are now ready for adoption by qualified individuals. Donations in kind(dog food, medicine, food bowls building materials for dog cat pens etc.) or in cash are always welcome.
				
			</p>
		
		</td>
</table>
		<div class="line"></div>
</section>
</div>



<footer>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>




     
</body>
</html>
