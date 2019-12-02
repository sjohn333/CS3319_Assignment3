<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Office </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	include "connecttodb.php";
	
	
	$answer = $_POST["DoubleCheck"];//answer to the delete yes or no button
	if ($answer=="No"){//Do not delete the doctor

		echo "Did not delete doctor.";
		
	}
	else{
		
		$query3 = 'DELETE FROM doctor WHERE LicenseNumber="'.$answer.'";';//Delete the doctor query where the license number is the one selected

		mysqli_query($connection, $query3);
	
		echo "Doctor successfully deleted!";
	}
	mysqli_close($connection);
?>

</body>
</html>
