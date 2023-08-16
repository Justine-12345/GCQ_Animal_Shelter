
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
			font-weight: 900;
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
			width: 200px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 5px;
		}


		p:hover {
			background-color: white;
			margin: 4px;
			border-radius: 5px;
			color: blue;
			margin-left: auto;
			margin-right: auto;
			margin-top: 5px;
		}

		

	</style>
	<title>Back Up & Restore | Welcome</title>
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
			 
				echo "<tr><th><h1>Back Up And Restore</h1></th></tr>";

				// print "<p>Welcome, your session ID is ".session_id()."</p>\n\n";
				echo "<tr><td>";
				echo '<a href="backup.php" class="ang" ><p>Back Up</p></a>';
	    		echo '<a href="restore.php" class="ang"><p>Restore</p></a>';
	    		echo "</td></tr>";
			 }
			 else{
			 		echo '<script>window.location.href = "login.php"</script>';
			 }
			?>	

			</table>		
</div>
  
	


<footer style="position: absolute; bottom: 0px; width: 100%"><div>
	<div>
		GCQ Animal Shelter &copy; copyright 2019<br>
		This website is intended for my project in Information Management
	</div>
</footer>
</body>
</html>

