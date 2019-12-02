<!DOCTYPE=html>
<html>
<head>
	<title> Doctors </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	include "connecttodb.php";
?>
<h1> List of all doctors before your given date!</h1>
<ol>
<?php
	$LicDate = $_POST["LicenseDate"];//Getting the date submitted by the user
	if (!$LicDate){// if this runs that means no date was entered
		echo "You did not enter a date.";
	}
	$query2 = 'SELECT * FROM doctor WHERE Date < "' . $LicDate . '";';//get all the doctors where they got their license before the specific date
	$result2=mysqli_query($connection, $query2);
	if (!$result2){
		die("database queryDoctor failed");
	}
// get the information of all these specific
	while ($row=mysqli_fetch_assoc($result2)){
		echo "<li>". "Name: " . $row["FirstName"] . " " . $row["LastName"] ."<br>Specialization: " .$row["Speciality"] ."<br>License Date: " .$row["Date"];
	}
	mysqli_free_result($result2);
?>
</ol>
<?php
	mysqli_close($connection);
?>
</body>
</html>
