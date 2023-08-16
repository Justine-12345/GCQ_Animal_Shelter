
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
			margin: 30px;
			padding-left: 30px; 
			padding-right: 30px;
			background-color: #0034FF77
			color:white;
			font-weight: 900
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
		
		.records {
			text-align: center;
				color: white;
		}

		.records p{
			color: white;
			font-weight: 900;
			background-color: blue;
			border-radius: 5px;
			width: 550px;
			margin: 5px;
		}


		p:hover {
			background-color: white;
			margin: 4px;
			border-radius: 5px;
			color: blue;
		}

		

	</style>
	<title>Admin Panel | Welcome</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul style="display: inline">
	    				<li>
	   					<form action="logout.php" method="post">
	    				<input type="submit" name="logout" value="Log-out"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px">
	    				</form>
	    			</li>
	    			<li>
	   					<form action="adminPanel.php" method="post">
	    				<input type="submit" name="adminPanel" value="Admin"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	   			
	    		</ul>
	    	</nav>
	    </div>
     </header>

<div class="records">		
		<table>
			<?php 
			
			 session_start();
			
			 if (isset($_SESSION['username'])) {
			 
				echo "<tr><th><h1>Welcome ".$_SESSION['first_name']." ".$_SESSION['last_name']."!!!</h1></th></tr>";

				// print "<p>Welcome, your session ID is ".session_id()."</p>\n\n";
				echo "<tr><td>";
				echo '<a href="CrudAnimal.php" class="ang" ><p>Animals</p></a>';
	    		echo '<a href="CrudRescuer.php" class="ang"><p>Rescuers</p></a>';
	    		echo '<a href="CrudEmployee.php" class="ang"><p>Employee</p></a>';
	    		echo '<a href="CrudCash.php" class="ang"><p>Cash</p></a>';
	    		echo '<a href="CrudMaterial.php" class="ang"><p>Materials</p></a>';
	    		echo '<a href="CrudAdopter.php" class="ang"><p>Adopters</p></a>';
	    		echo '<a href="CrudDisease.php" class="ang"><p>Diseases</p></a>';
	    		echo '<a href="in_ex_port.php" class="ang"><p>Back Up & Export</p></a>';
	    		echo "</td></tr>";
			 }
			 else{
			 		echo '<script>window.location.href = "login.php"</script>';
			 }
			?>	

			</table>		
</div>
  
	


<footer style="position: static; bottom: 0px">
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>


     
</body>
</html>
