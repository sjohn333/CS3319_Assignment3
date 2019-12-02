<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information </title>
	<link rel="stylesheet" href="MakePretty.css">
</head>

<body>
<h1>Welcome to the Patient Waiting Room!</h1>
<!--Area to get the patients information based on ohip number -->
<h2>Please enter the OHIP Number of the patient's file you wish to see.</h2>
<form action="getPatient.php" method="post">
	<input type="text" name="OHIP"><br>
	<input type="submit" value="Submit OHIP Number"/>
</form>
<!--area where you can assign a patient to a doctor-->
<h2> Click the button if you wish to assign a doctor to a patient.</h2>
<form action="treatPatient.php" method="post">
	<input type="submit" value="Start Treatment"/>
</form>
<!--area where you can stop a treatment-->
<h2>Click the button if you wish to make doctor end the treatment of a patient.</h2>
<form action="stopTreatPatient.php" method="post">
	<input type="submit" value="Stop Treatment"/>
</form>
<!--area where you can click to see all the docto wh are not treating any patients-->
<h2>Click the button if you wish to see all the doctors who are not treating any patients.</h2>
<form action="getLazyDocs.php" method="post">
	<input type="submit" value="View Doctors"/>
</form>
</body>
</html>
