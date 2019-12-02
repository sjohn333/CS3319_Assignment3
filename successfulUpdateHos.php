<!DOCTYPE=html>
<html>
<head>
	<title> Hospital </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	$HosCode = $_POST["HospN"];//gets the hospital whos name you want to change
	$HosName = $_POST["newHosName"];//gets the name you want to change it to
	if($HosCode=="" || $HosName==""){//if either of the fields are not inputted then it will not change anything
		die("You did not input all the required fields.");
	}
	include "connecttodb.php";
	$query = 'UPDATE hospital SET Name="'.$HosName.'" WHERE HospitalCode="'.$HosCode.'";';//query that preforms the update 

	$result=mysqli_query($connection, $query);
	
	echo "Succesfully updated the hospital name!";//will only output this if it does the update

	mysqli_close($connection);
?>	

</body>
</html>
