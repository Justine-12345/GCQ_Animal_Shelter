<?php  
include ('readCash.php');
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

		.records th {
			color: #FFEF00 ;
			text-shadow: gray 1px 1px 3px;
			width: 300px;
		}
	</style>
	<title>Cash Donation | Welcome</title>
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
	<form  action="createCash.php" method="post" enctype="multipart/form-data">
	<h3>ADD CASH DONATION</h3>		
	<table>
		<td>
			<p><label>FirstName:</label></p>
			<p><label>LastName:</label></p>
			<p><label>Cash Amount:</label></p>
		</td>
		<td>
			<p><input type="text" name="cashFname" placeholder="Enter Firstname" size="10" required/></p>
			<p><input type="text" name="cashLname" placeholder="Enter Lastname" size="10" required/></p>
			<p><input type="text" name="cashAmount" placeholder="Enter Cash Amount" size="20" required/></p>
		</td>
		<td class="labels">
			<p><label>Donation Method:</label></p>
			<p><label>Donation Date:</label></p>
		</td>
		<td>
			<p><select name="cashMethod" placeholder="Enter Donation Method" required>
				<option value=""></option>
				<option value="Cash">Cash</option>
				<option value="Check">Check</option>
				<option value="Credit Card">Credit Card</option>
				<option value="GCash">GCash</option>
				<option value="PayMaya">PayMaya</option>
				<option value="Other">Other</option>
			</select></p>
			<p><input type="date" name="cashDate" placeholder="Enter Date" size="20"/></p>
		</td>
	</table>
		<h3 class="btncreate"><input type="submit" name="cashCreate" value="CREATE" style="width: 150px"></h3>
	</form>
</div>

<div class="records">
<h3>CASH DONATION RECORD</h3>	 
		<table border="1" style="border-collapse: collapse;" >
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Donation Amount</th>
			<th>Donation Date</th>
			<th>Donation Method</th>
			<th>Actions</th>
		</tr>
<?php 
if (isset($_SESSION['username'])) {
while($result = mysqli_fetch_array($cashSql)){?>

		 <tr>
			<td><?php echo $result['donation_id'] ?></td>
			<td><?php echo $result['donation_fname'] ?></td>
			<td><?php echo $result['donation_lname'] ?></td>
			<td><?php echo $result['donation_amount'] ?></td>
			<td><?php echo $result['donation_date'] ?></td>
			<td><?php echo $result['donation_method'] ?></td>
			<td>
				<h3>
				<form action="updateCash.php" method="get" >
					<input type="hidden" name="editID" value="<?php echo $result['donation_id'] ?>">
					<input type="hidden" name="editFname" value="<?php echo $result['donation_fname'] ?>">
					<input type="hidden" name="editLname" value="<?php echo $result['donation_lname'] ?>">
					<input type="hidden" name="editAmount" value="<?php echo $result['donation_amount'] ?>">
					<input type="hidden" name="editDate" value="<?php echo $result['donation_date'] ?>">
					<input type="hidden" name="editMethod" value="<?php echo $result['donation_method'] ?>">
					<input type="submit" name="editDonation" value="EDIT" style="width: 80px">
				</form>
				<form action="deleteCash.php" method="get">
					<input type="hidden" name="deleteID" value="<?php echo $result['donation_id']?>">
					<input type="hidden" name="deleteFname" value="<?php echo $result['donation_fname'] ?>">
					<input type="hidden" name="deleteLname" value="<?php echo $result['donation_lname'] ?>">
					<input type="submit" name="deleteDonation" value="DELETE"  style="width: 80px">
				<h3>
				</form>	
			</td>
		</tr>	
<?php 
}
}
else
{echo '<script>window.location.href = "login.php"</script>';}
?>
</table>
</div>


<footer>
	<div>
		GCQ Animal Shelter &copy; copyright 2019
		<p>This website is intended for my project in Information Management</p>
	</div>
</footer>
</body>
</html>

