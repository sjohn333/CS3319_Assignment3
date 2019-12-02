<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information!  </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	$Doc=$_POST["DocName"];//get the doctor who should stop treating them
	$Patient=$_POST["PatientName"];//get the patient who should stop getting treated by this doctor, can still be treated by someone else
	if($Doc=="" || $Patient==""){//if either field is not filled then don't do the query
		die("You did not input all the required fields.");
	}
	include "connecttodb.php";
	$query = 'DELETE FROM hasAssigned WHERE DoctorLicNum="'.$Doc.'" AND PatientOHIPNum = "'.$Patient.'";';//delete query to stop the treating of that patient by that doctor
	mysqli_query($connection, $query);
	echo "Doctor is now not treating that patient!";//will output this regardless if this doctor ever was treating them or not
	mysqli_close($connection);
?>

</body>
</html>
