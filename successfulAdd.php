<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Office </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
//Get all the information inputted into the fields for the new doctor
	$FName=$_POST["FirstN"];
	$LName=$_POST["LastN"];
	$LNum=$_POST["LicNum"];
	$LDate=$_POST["LicDate"];
	$Spec=$_POST["Spec"];
	$HosN=$_POST["HospN"];
	if($FName=="" || $LName=="" || $LNum=="" || $LDate=="" || $Spec=="" || $HosN==""){
		die("You did not input all the required fields.");//if any of the inputs are not inputted it will not put the correct data in the database so don't let it
	}
	include "connecttodb.php";

	$query = 'select LicenseNumber from doctor;';//to check if the license number already exists

	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database querySelect failed");
	}
	while ($row=mysqli_fetch_assoc($result)){
		if ($row["LicenseNumber"]=="$LNum"){
			die("License Number Already Exists!");//checking if it already exists
		}
	}	

	$query2 = 'INSERT INTO doctor (LicenseNumber, FirstName, LastName, Speciality, Date, WorksAtHosCode) VALUES("'.$LNum.'","'.$FName.'","'.$LName.'","'.$Spec.'","'.$LDate.'","'.$HosN.'");';//insert the new doctor with all their information into the database table
	
	mysqli_query($connection, $query2);
	mysqli_free_result($result);
	mysqli_close($connection);
?>
<h1> Doctor successfully added! </h1><!--will only ready this point if it was actually added-->
</body>
</html>
