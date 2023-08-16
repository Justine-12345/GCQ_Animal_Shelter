<?php  
include ('readEmployee.php');
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

		.noBot{
			border-top: none;
			border-left: none;
		}
		
		.records th {
			color: #FFEF00 ;
			text-shadow: gray 1px 1px 3px;
		}
	</style>
	<title>Employee | Welcome</title>
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


<div class="create">
		<h3>ADD EMPLOYEE</h3>
	<form  action="createEmployee.php" method="post" enctype="multipart/form-data">
		<table>
			<td>
				<p><label>FirstName:</label></p>
				<p><label>LastName:</label></p>
				<p><label>Job Description:</label></p>
				<p><label>Gender:</label></p>
			</td>	
			<td>
				<p><input type="text" name="employeeFname" placeholder="Enter Firstname" size="10" required/></p>
				<p><input type="text" name="employeeLname" placeholder="Enter Lastname" size="10" required/></p>
				<p><input  type="text" name="employeeDesc" placeholder="Enter Description" size="15" required/></p>
				<p>
				<input type="radio" name="employeeGender" value="Male" required>
				<label for="male">Male</label>
				<input type="radio" name="employeeGender" value="Female">
				<label for="female">Female</label><br>
				</p>
			</td>
			<td class="labels">
				<p><label>Age:</label></p>
				<p><label>Contact No:</label></p>
				<p><label>Address:</label></p>
				<p><label>Profile Picture:</label></p>
			</td>
			<td>
				<p><input type="number" name="employeeAge" min="18" max="200" step="1" size="15" placeholder="Age" required/></p>
				<p><input type="text" name="employeeContact" placeholder="Enter Contact No." size="20" required/></p>
				<p><input type="text" name="employeeAdress" placeholder="Enter Address" size="20"/></p>
				<p><input type="file" name="fileToUpload" id="fileToUpload"></p>
				
			</td>
		</table>
			<h3 class="btncreate"><input type="submit" name="employeeCreate" value="CREATE"></h3>

	</form>
</div>

<div class="records">
<h3>EMPLOYEE RECORD</h3>	 
<?php 
if (isset($_SESSION['username'])) {
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
		<h3>
				<form action="updateEmployee.php" method="get">
					<input type="hidden" name="editDesc" value="<?php echo $result['employee_desc'] ?>">
					<input type="hidden" name="editID" value="<?php echo $result['employee_id'] ?>">
					<input type="hidden" name="editFname" value="<?php echo $result['employee_fname'] ?>">
					<input type="hidden" name="editLname" value="<?php echo $result['employee_lname'] ?>">
					<input type="hidden" name="editGender" value="<?php echo $result['employee_gender'] ?>">
					<input type="hidden" name="editAge" value="<?php echo $result['employee_age'] ?>">
					<input type="hidden" name="editContact" value="<?php echo $result['employee_contact'] ?>">
					<input type="hidden" name="editAddress" value="<?php echo $result['employee_address'] ?>">
					<input type="hidden" name="editPic" value="<?php echo "<img src='image/".$result['employee_picture']."' style='width: 100px; height: 100px' alt='image_for_employee'> " ?>">
					<input type="hidden" name="editPicName" value="	<?php echo  $result['employee_picture'] ?>" >
					<input type="submit" name="editEmployee" value="EDIT"  style="width: 80px">
				</form>
				<form action="deleteEmployee.php" method="get">
					<input type="hidden" name="deleteID" value="<?php echo $result['employee_id']?>">
					<input type="hidden" name="deleteFname" value="<?php echo $result['employee_fname'] ?>">
					<input type="hidden" name="deleteLname" value="<?php echo $result['employee_lname'] ?>">
					<input type="submit" name="deleteEmployee" value="DELETE" style="width: 80px">
				</form>
		</h3><div class="line"></div>
</section>
<?php 					
}
}
else
{echo '<script>window.location.href = "login.php"</script>';}
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

