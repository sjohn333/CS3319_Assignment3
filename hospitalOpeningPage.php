<!DOCTYPE=html>
<html>
<head>
	<title> Hospital  </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>

<h1> Welcome to the Hospital Area!</h1>
<!--Area to get all the hospitals information-->
<h2> Get the hospital's informatin!</h2>
<form action="getHospital.php" method="post">
	<input type="submit" value="Get information"><br>
</form>
<!--area where you can update the hospitals name-->
<h2> Would you like to update a hospital's name?
<form action="updateHospital.php" method="post">
	<input type="submit" value="Click here to update"><br>
</form>

</body>
</html>
