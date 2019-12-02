<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Information </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<h1> Doctors Information!</h1>
<?php
	include "connecttodb.php";
	$DocChosen=$_POST["Docs"];//Getting the doctor selected
	$query = 'SELECT doctor.*, hospital.Name, hospital.City  FROM doctor INNER JOIN hospital ON WorksAtHosCode=HospitalCode WHERE LicenseNumber="' . $DocChosen .'";';//Query to get the doctor's information of the specific doctor
	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database queryDoctor failed");
	}
//Output all the doctors information
	while ($row=mysqli_fetch_assoc($result)){
		echo "Name: " . $row["FirstName"] . " " . $row["LastName"] ."<br>Specialization: " . $row["Speciality"] . "<br>License Number: ". $row["LicenseNumber"] . "<br>License Date: " .$row["Date"] . "<br> Hospital They Work At: " .  $row["Name"]." in ".  $row["City"];
	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>
</body>
</html>
