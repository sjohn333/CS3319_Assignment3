<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information!  </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>

<?php
	include "connecttodb.php";
	$OhipNum=$_POST["OHIP"];// get the OHIP number from the submitted form

	$query = 'SELECT * FROM patient WHERE OHIPNumber="'.$OhipNum.'";';//get patient information only of the one patient
	$result=mysqli_query($connection, $query);
	
	$row=mysqli_fetch_assoc($result);
	if (!$row){// if this runs that means there is no patient with that ohip number or they didn't input a number
		die("No patient with that OHIP Number exist.");
	}
		

	$query2 = 'SELECT patient.FirstName as FName, patient.LastName as LName, doctor.FirstName, doctor.LastName, doctor.LastName FROM hasAssigned INNER JOIN doctor ON DoctorLicNum=LicenseNumber INNER JOIN patient ON OHIPNumber=PatientOHIPNum WHERE OHIPNumber="'.$OhipNum.'";';//query that gets the patient names and their treating doctors
	$result2=mysqli_query($connection, $query2);
	$count ="1";
	while ($row2=mysqli_fetch_assoc($result2)){//will only run if the patient is being treated
		if ($count=="1"){//will always run this
			echo "Patient's Name: " . $row["FirstName"] . " " . $row["LastName"] ."<br> ";
			echo "Being Treated by Doctor " . $row2["FirstName"] . " " . $row2["LastName"];
			$count="2";
		}	
		else{//will run this if there is more then one doctor treating that patient
			echo " and by Doctor " . $row2["FirstName"] . " " . $row2["LastName"]."<br>";
		}
	}
	$query3 = 'SELECT count(doctor.LastName) as x FROM hasAssigned INNER JOIN doctor ON DoctorLicNum=LicenseNumber INNER JOIN patient ON OHIPNumber=PatientOHIPNum WHERE OHIPNumber="'.$OhipNum.'";';//query for if the patient is currently not being treated but still exists
	$result3=mysqli_query($connection, $query3);
	$test=mysqli_fetch_assoc($result3);
	if ($test[x]=="0"){//will output the patient name and state that they are not being treated
		echo "Patient's Name: " . $row["FirstName"] . " " . $row["LastName"] ."<br> ";
		echo "Patient is not being treated.";
	}
	
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_close($connection);
?>
</body>
</html>


