<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<h2>Select the patient you wish to stop treating: </h2>
<form action="successfulStopTreat.php" method="post">
<?php
	include "connecttodb.php";
	$query = 'SELECT * FROM patient;';//get all patients

	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database query failed");
	}
	while ($row=mysqli_fetch_assoc($result)){//output all patients as radio buttons
		echo "<input type = 'radio' name='PatientName' value='".$row['OHIPNumber']."' > Patient's OHIP Number: ". $row['OHIPNumber'] . " Patients's Name: " . $row['FirstName'] . " " . $row['LastName'] . "<br>";
	}
?>
<h2>Select the doctor you wish to make stop treating this patient, regardless if they currently are or not: </h2>
<?php
	$query2 = 'SELECT * FROM doctor;';//get all doctors

	$result2=mysqli_query($connection, $query2);
	if (!$result2){
		die("database query failed");
	}
	while ($row=mysqli_fetch_assoc($result2)){//output all doctors as radio buttons
		echo "<input type = 'radio' name='DocName' value='".$row['LicenseNumber']."' > Doctor's License Number: ". $row['LicenseNumber'] . " Doctor's Name: " . $row['FirstName'] . " " . $row['LastName'] . "<br>";
	}
?>
<input type="submit" value="submit"/>
<?php
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_close($connection);
?>

</body>
</html>
