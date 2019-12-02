<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Office </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>

<h1> Welcome to the Doctor's Office!</h1>
<!--Area to get the doctor's information in a certain order -->
<form action="getDoctor.php" method="post">
	<h2> See a list of all doctors that work here! </h2>
	<h3> Choose the method you wish sort the doctors: </h3>
<!--Select the way you want to order them either by first name or last name -->
	<input type="radio" name="Sort" value="FirstName" checked="checked"> Sort by First Name<br>
	<input type="radio" name="Sort" value="LastName"> Sort by Last Name<br>

	<h3> Choose the doctors to be in : </h3>
<!--Select whether to sort it by ascending order or descending order -->
	<input type="radio" name="AscDes" value="ASC" checked="checked"> Ascending Order Name<br>
	<input type="radio" name="AscDes" value="DESC"> Descending Order<br>

	<input type="submit" value="Click to view all the doctors"><br>
</form>
<!--Area to get the doctors before a certain date -->
<h2> You may input a date to see which doctor's were licensed before then.</h2>
<h3> Select a date: </h3>
<form action="getDateDoctor.php" method="post">
	<input type="date" name="LicenseDate">
	<input type="submit" value="Click to view all these specific doctors"><br>
</form>
<!--Area where you add a doctor -->
<h2> Add a new doctor to the system. </h2>
<form action="addDoctor.php" method="post">
	<input type="submit" value="Click to add a new doctor"><br>
</form>
<!--Area to delete a doctor -->
<h2> Delete a doctor from the system. </h2>
<form action="deleteDoctor.php" method="post">
	<input type="submit" value="Click to delete a doctor"><br>
</form>
</body>
</html>
