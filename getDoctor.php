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
<h1> List of all Doctors!</h1>
<ol>
<?php
	$sortBy = $_POST["Sort"]; //variable that holds the answer to the sorting firstname or last name
	$orderBy=$_POST["AscDes"];//variable that hols the answer to the choice between ascending or descending
	
	$query = 'SELECT * FROM doctor ORDER BY ' .$sortBy. ' ' .$orderBy.';'; //query that will get all doctors in the specific order you wanted

	$result=mysqli_query($connection, $query);
	if (!$result){
		die("database queryDoctor failed");//test if you could get the query
	}
?>
<!--Output the answer to the query in radio buttons -->
<form action="radioDoc.php" method="post">
	<?php
	while ($row=mysqli_fetch_assoc($result)){
		echo '<input type = "radio" name="Docs" value="'.$row["LicenseNumber"].'" > ' . $row["FirstName"] . ' ' . $row["LastName"] . '<br>';
	}
	?>
	<input type="submit" value="submit"/><!--will let you pick which doctor to get more information on -->
</form>
</ol>
<?php
	
	mysqli_free_result($result);
	mysqli_close($connection);
?>
</body>
</html>
