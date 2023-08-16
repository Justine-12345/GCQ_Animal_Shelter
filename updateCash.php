<?php
session_start();
require ('includes/config.php');
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

		.line{
			background-color: orange;
			height: 1px;
			margin-top: 30px;
			margin-bottom: 30px;
			margin-left: 100px;
			margin-right: 100px;
		}
	</style>
	<title>Cash Donation | Edit</title>
</head>
<body>
 <header id="mainHeader">
	 	<div class="case">
	 		<img src="image/cat.png">
	    	<nav>
	    		<ul>
	    			<li>
	   					<form action="CrudCash.php" method="post">
	    				<input type="submit" name="back" value="Back"  style="color: white; background-color: #0034FF77;padding: 10px;  border-radius: 3px; border: 1px solid gray; width: 100px; margin: 3px ">
	    				</form>
	    			</li>
	    			
	    		</ul>
	    	</nav>
	    </div>
     </header>

<div class="create">  
<h3>EDIT DONATION #<?php echo " ".$_GET['editID']." ". $_GET['editFname']." ".$_GET['editLname'] ?></h3>	
<form  action="#" method="post" enctype="multipart/form-data">
	<table>
		<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
			<p><label>Cash Amount:</label></p>	
		</td>
		<td>
			<p><input type="text" name="cashFnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editFname']?>" required/></p>

			<p><input type="text" name="cashLnameU" placeholder="Enter Firstname" size="10" value="<?php echo $_GET['editLname']?>" required/></p>

			<p><input type="text" name="cashAmountU" placeholder="Enter Cash Amount" size="15" value="<?php echo $_GET['editAmount']?>" required/></p>
		</td>
		<td class="labels">
			<p><label>Donation Method:</label></p>
			<p><label>Donation Date:</label></p>
		</td>
		<td>
			<p><select name="cashMethodU" placeholder="Enter Donation Method" required>
			<option value=""></option>
			<option value="Cash">Cash</option>
			<option value="Check">Check</option>
			<option value="Credit Card">Credit Card</option>
			<option value="GCash">GCash</option>
			<option value="PayMaya">PayMaya</option>
			<option value="Other">Other</option>
			</select>
			<label style="font-style: italic; color: gray; font-size: 12px">(*Value before:<?php echo $_GET['editMethod']; ?>)</label>
			<p><input type="date" name="cashDateU" placeholder="Enter Date" size="10" value="<?php echo $_GET['editDate']?>" required/></p>		
		</td>
	</table>
	<h3 class="btncreate"><input type="submit" name="cashUpdate" value="UPDATE"><h3>
	</form>

<?php
if(isset($_SESSION['username'])){
if (isset($_POST['cashUpdate'])) {
$cashFname = mysqli_real_escape_string($conn, $_POST['cashFnameU']);
$cashLname = mysqli_real_escape_string($conn, $_POST['cashLnameU']);
$cashAmount = mysqli_real_escape_string($conn, $_POST['cashAmountU']);
$cashMethod = mysqli_real_escape_string($conn,$_POST['cashMethodU']);
$cashDate = mysqli_real_escape_string($conn,$_POST['cashDateU']);
$queryUpdate = "";
	$queryUpdate = "UPDATE donation SET donation_fname = '".$cashFname."', donation_lname = '".$cashLname."', donation_amount =  '".$cashAmount."',  donation_date = '".$cashDate."',  donation_method = '".$cashMethod."' WHERE donation_id =  '".$_GET['editID']."'";
		
	mysqli_query($conn, $queryUpdate);
echo '<script>alert("Succesfully Updated #ID'.$_GET['editID'].'")</script>';
echo '<script>window.location.href = "CrudCash.php"</script>';
}
}
?>
</div> 
<footer style="position: absolute; bottom: 0px; width: 100%"><div>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
</body>
</html>


