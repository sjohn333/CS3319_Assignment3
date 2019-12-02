<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Office </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	include "connecttodb.php";
	$query = 'SELECT * FROM hospital;';//get the hospitals infomartion to put in radio buttons for the person to select the available ones so that they will for sure be assigned to an existing hospital

	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database query failed");
	}
?>

<h1> Add a new doctor!</h1>
<!--Get all the required information to make a new doctor -->
<form action="successfulAdd.php" method="post">
	<h2> Please enter the doctor's first name.</h2>
	<input type="text" name="FirstN"><br>
	<h2> Please enter the doctor's last name.</h2>
	<input type="text" name="LastN"><br>
	<h2> Please enter the doctor's license number.</h2>
	<input type="text" name="LicNum"><br>
	<h2> Please enter the date the doctor received his license.</h2>
	<input type="date" name="LicDate"><br>
	<h2> Please enter the doctor's specialization.</h2>
	<input type="text" name="Spec"><br>
	<h2> Please select the hospital the doctor works at.</h2>
	<?php
//get all the hospitals and output them in radio buttons to be selected from
	while ($row=mysqli_fetch_assoc($result)){
		echo '<input type = "radio" name="HospN" value="'.$row["HospitalCode"].'" > Hospital Code: '. $row["HospitalCode"] . ' Hospital Name: ' . $row["Name"] . '<br>';

	}
	?>
	<input type="submit" value="submit"/>
</form>
<?php
	
	mysqli_free_result($result);

	mysqli_close($connection);
?>
</body>
</html>
