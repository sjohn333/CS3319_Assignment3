<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information!  </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<form action="successfulTreat.php" method="post">
<?php
	$Doc=$_POST["DocName"];//doctor you want to treat the patient
	$Patient=$_POST["PatientName"];//patient you want to be treated
	if($Doc=="" || $Patient==""){//if either input was not filled, do not do the query
		die("You did not input all the required fields.");
	}
	include "connecttodb.php";
	$query = 'INSERT INTO hasAssigned VALUES ("'.$Doc.'", "'.$Patient.'");';//query to amke the doctor treat that patient
	mysqli_query($connection, $query);
	echo "Doctor is now treating your patient!";//will only output if it was able to do so
	mysqli_close($connection);
?>

</body>
</html>
