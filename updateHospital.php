<!DOCTYPE=html>
<html>
<head>
	<title> Hospital  </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<?php
	include "connecttodb.php";
	$query = 'SELECT * FROM hospital;';//get the information about the hospitals

	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database query failed");
	}
?>
<form action="successfulUpdateHos.php" method="post">
<!--gives a list of all the hopitals in the database that you can then alter to ensure you are altering one that actually exists-->
	<h2> Please select the hospital you wish to update.</h2>
	<?php
	//output all the hospitals in radio buttons
	while ($row=mysqli_fetch_assoc($result)){
		echo '<input type = "radio" name="HospN" value="'.$row["HospitalCode"].'" > Hospital Code: '. $row["HospitalCode"] . ' Hospital Name: ' . $row["Name"] . '<br>';
	}
	?>
	<!--input area for the new name of the selected hospital-->
	<h2> Please enter the hospital's new name.</h2>
	<input type="text" name="newHosName"><br>
	<input type="submit" value="Update"/>
</form>
<?php
mysqli_free_result($result);
mysqli_close($connection);
?>
</body>
</html>
