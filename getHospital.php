<!DOCTYPE=html>
<html>
<head>
	<title> Hospital  </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<h1> Hospital's Information!</h1>
<ol>
<?php
	include "connecttodb.php";
	$query = 'SELECT hospital.Name, hospital.StartDateOfHead, doctor.FirstName, doctor.LastName FROM hospital INNER JOIN doctor ON HeadDoctorLicenseNum=LicenseNumber ORDER BY Name;';//Query that gets the hospitals' information and who their head doctor is

	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database query failed");
	}
	while ($row=mysqli_fetch_assoc($result)){
		//show all the hospitals that exist and their head doctors name
		echo "<li> Name of Hospital: ".$row["Name"]."<br>Name of Head Doctor: " . $row["FirstName"] . " " . $row["LastName"] ."<br>Start Date of Head Doctor: " . $row["StartDateOfHead"];
	}
	mysqli_free_result($result);
	mysqli_close($connection);
?>
</ol>

</body>
</html>
