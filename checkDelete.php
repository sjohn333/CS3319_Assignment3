<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Office </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	include "connecttodb.php";
	$LNum = $_POST["LicNum"];//grabbing the delete license number from the page before this
	$query = 'select count(LicenseNumber) as x from doctor WHERE LicenseNumber="'.$LNum.'";';//query to see if the license they are trying to delete even exists	

	$result=mysqli_query($connection, $query);
	$row=mysqli_fetch_assoc($result);
	if ($row["x"]==0){//if this occurs it means there is no doctor with this license number
		die("Chosen license number does not exist thus no doctor to delete");
	}

	$query2 = 'select count(DoctorLicNum) as y from hasAssigned WHERE DoctorLicNum="'.$LNum.'";';//query to see if the doctor is treating any patients to see if we need to warn them before they delete	

	$result2=mysqli_query($connection, $query2);
	$row=mysqli_fetch_assoc($result2);
	if ($row["y"]==0){//Not treating patients
		echo "Doctor is not treating any patients...<br>";
		echo "Will now try to delete the doctor.<br>";
		echo "Are you sure you still want to delete this doctor?";
		
	}
	else//doctor IS treating patients
	{
		echo "Doctor is treating patients.<br>";
		echo "Are you sure you still want to delete this doctor and have them abandon their patients?";
	}
	?>	
//always confirm to delete regardless of treating patients or not
	<form action="successfulDelete.php" method="post">
		<input type="radio" name="DoubleCheck" value="<?php echo $_POST['LicNum']; ?>" > Yes <br>
		<input type="radio" name="DoubleCheck" value="No" checked="checked"> No <br>
	
		<input type="submit" value="Submit"><br>
	</form>
<?php
	mysqli_free_result($result);
	mysqli_free_result($result2);

	mysqli_close($connection);
?>
</body>
</html>
