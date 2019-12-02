<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<h1> List of all doctors currently not treating any patients!</h1>
<?php
	include "connecttodb.php";
	$query = 'SELECT * FROM doctor WHERE LicenseNumber NOT IN (SELECT DoctorLicNum FROM hasAssigned);';//query to get all the doctors who aren't treating patients
	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database query failed");
	}//output the information of only those doctors
	while ($row=mysqli_fetch_assoc($result)){
		echo "<li>". "Name: " . $row["FirstName"] . " " . $row["LastName"]."<br>";
	}
	mysqli_free_result($result);
	mysqli_close($connection);
?>

</body>
</html>

