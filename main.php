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

   <section class="cover">
     	<div class="case">
	     	<h2 style="color: orange"><b>Welcome !!!<b></h2>
	     	<br>
	     	<p style="color: yellow"> <b>GCQ animal shelter is a non profit organization that rescues
 stray dogs and cats. the shelter records the animal's breed, gender, approximate age and 
 other relevant information. We also checked for diseases or injuries by volunteer veterinarians.
 once these strays are rehabilitated, they are now ready for adoption by qualified individuals.
Donations in kind(dog food, medicine, food bowls building materials for dog cat pens etc.) or in cash are always welcome.</b></p>
     	</div>
     </section>


<div class="records">
<h3>FREE TO ADOPT HEALTHY ANIMALS</h3>	 
<?php 
while($results = mysqli_fetch_array($sqlAccAnimal)){ ?>
<section>
 <table>
		<td class="picture">
		<?php echo "<img src='image/".$results['animal_picture']."' style='width: 200px; height: 200px' alt = 'animal_picture'>" ?>
		<div class="btncreate"><form action="contact.php"><input type="submit" name="animalCreate" value="ADOPT ME"></form></div>

		</td>
		<td class="labels">
			<p>ID: <?php echo $results['animal_id'] ?></p>
			<p>Name: <?php echo $results['animal_name'] ?></p>
			<p>Type: <?php echo $results['animal_type'] ?></p>
			<p>Gender: <?php echo $results['animal_gender'] ?></p>
			<p>Color: <?php echo $results['animal_color'] ?></p>
			<p>Age: <?php echo $results['animal_age'] ?></p>
		
		</td>
		<td class="labels"  style="padding-right: 100px">
			<p>Breed: <?php echo $results['animal_breed'] ?></p>
			<p>Sicknes: <?php echo $results['disease_name']?></p>
			<p>Rescuer Name: <?php echo "#".$results['rescuer_id']." ".$results['rescuer_fname'] ?></p>
			<p>Employee Name: <?php echo "#".$results['employee_id']." ".$results['employee_fname'] ?></p>
			<p>Adopter Name: <?php echo "None"?></p>
			<p>Rescue Date: <?php echo $results['rescue_date'] ?></p>
		</td>
</table>
		<div class="line"></div>
</section>




<?php 

}

?>
</div>




<div class="records">
<h3>OUR RESCUERS</h3>	 
<?php 
while($result = mysqli_fetch_array($rescuerSql)){?>
<section>
		<table>
		
		<tr>
			<th></th>
			<th>Rescuer Info</th>
			<th class="labels"  style="padding-right: 100px">Animal Rescued</th>
		</tr>
			<td>
			<?php echo "<img src='image/".$result['rescuer_picture']."' style='width: 200px; height: 200px' alt='Rescuer_image'>" ?>
			</td>
		<td style="padding-left: 50px">
			<p>ID: <?php echo $result['rescuer_id'] ?></p>
			<p>First Name: <?php echo $result['rescuer_fname'] ?></p>
			<p>Last Name: <?php echo $result['rescuer_lname'] ?></p>
			<p>Gender: <?php echo $result['rescuer_gender'] ?></p>
			<p>Age: <?php echo $result['rescuer_age'] ?></p>
			<p>Contact No: <?php echo $result['rescuer_contact'] ?></p>
			<p>Address: <?php echo $result['rescuer_address'] ?></p>
		</td>
		
		<td class="labels">
			<?php  
			require('includes/config.php');
				$rescuedAnimalQuery = "SELECT animal.animal_id, animal.animal_name FROM animal, rescuer Where animal.rescuer_id = rescuer.rescuer_id AND rescuer.rescuer_id = '".$result['rescuer_id']."' ";
				$rescuedAnimalSql = mysqli_query($conn, $rescuedAnimalQuery);

				while ($resAnimal = mysqli_fetch_array($rescuedAnimalSql)) { 

					 echo "<p>#ID".$resAnimal['animal_id']." ". $resAnimal['animal_name']."</p>";
					 }
		 ?>
		</td>	
	
		</table>
			<div class="line"></div>
		</section>
<?php 				
}
?>
</section>
</div>



<div class="records">
<h3>OUR SATISFIED ADOPTER</h3>	 
<?php 
while($result = mysqli_fetch_array($adopterSql)){?>
<section>
	<div>
		<table border="1" style="border-collapse: collapse;">
		<tr>
			<th class="labels">Adopter Info</th>
			<th class="labels">Animal Adopted</th>
		</tr>
		<td class="labels" style="padding-left: 50px">
			<p>ID: <?php echo $result['adopter_id'] ?></p>
			<p>First Name: <?php echo $result['adopter_fname'] ?></p>
			<p>Last Name: <?php echo $result['adopter_lname'] ?></p>
			<p>Contact No: <?php echo $result['adopter_contact'] ?></p>
			<p>Address: <?php echo $result['adopter_address'] ?></p>
		</td>
		<td class="labels">
			<?php  
			require('includes/config.php');
				$adoptAnimalQuery = "SELECT animal.animal_id, animal.animal_name FROM animal, adopter Where animal.adopter_id = adopter.adopter_id AND adopter.adopter_id = '".$result['adopter_id']."' ";
				$adoptAnimalSql = mysqli_query($conn, $adoptAnimalQuery);

				while ($adoptAnimal = mysqli_fetch_array($adoptAnimalSql)) { 
					 echo "<p>#ID".$adoptAnimal['animal_id']." ". $adoptAnimal['animal_name']."</p>";
					 }
		 ?>
		</td>	
		</table>
			<div class="line"></div>
			</div>
		</section>
<?php 
}
?>
</section>
</div>


<div class="records">
<h3>OUR EMPLOYEE</h3>	 
<?php 
while($result = mysqli_fetch_array($employeeSql)){?>
<section>
		<table>
		<td>
			<?php echo "<img src='image/".$result['employee_picture']."' style='width: 200px; height: 200px' alt='image_for_employee'>" ?>
		</td>
		<td style="padding-left: 50px">
			<p>Description:<?php echo $result['employee_desc'] ?></p>
			<p>ID: <?php echo $result['employee_id'] ?></p>
			<p>First Name: <?php echo $result['employee_fname'] ?></p>
			<p>Last Name: <?php echo $result['employee_lname'] ?></p>
			<p>Gender: <?php echo $result['employee_gender'] ?></p>
			<p>Age: <?php echo $result['employee_age'] ?></p>
			<p>Contact No: <?php echo $result['employee_contact'] ?></p>
			<p>Address: <?php echo $result['employee_address'] ?></p>
		</td>	
		</table>
				<div class="line"></div>
		</section>
<?php 			
}
?>
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
