<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
	</div>
<div class="home"><a href="index.php">Home</a></div>
	<div class="about"><a href="about.php">About</a></div>
	<div class="contact"><a href="contact.php">Contact us</a></div>
	<div class="excess"></div>
	<div class="section">
		<h1 id="abt">Contact Us</h1>
		<form method="#" action="contact.php" class="form" >
		<div class="edit">
			<label for="name">Name:</label>
			<input type="text" name="name">
		</div>
		<div class="edit">
			<label for="email">Email Address:</label>
			<input type="text" name="email">
		</div>
		<div class="edit">
			<label for="email">Email Address:</label>
			<textarea cols="70" rows="15" placeholder="Message"></textarea>
		</div>
			<input type="submit" name="#" value="submit" class="btn">
		</form>
		
	</div>
		<div class="choose-user">
		<div class="hosp">
			<img src="images/hospital.png" id="iconhospital" alt="iconhospital">
			<h3 style="font-family:helvetica; color: #416788;">COVID-19 Hospital Management System</h3>
		</div>
	</div>
	<div class="first"> 
		<p style="font-family: helvetica; font-size: 15px; color: #416788;">Choose type of user below:</p>
		<a href="Doctor/doctor_login.php"><div class="doctor">
			<img src="images/doctor.png" class="icon" alt="icondoc">
			<h2>Doctor</h2>
		</div></a>
		<a href="Nurse/nurse_login.php"><div class="user1"><img src="images/nurse.png" class="icon" alt="iconnurse">
			<h2>Nurse</h2>
		</div></a>
		<a href="Patient/patient_login.php"><div class="user1"><img src="images/patient.png" class="icon" alt="iconpatient">
			<h2>Patient</h2>
		</div></a>
	</div>
	<div class="second">
		<a href="Receptionist/recep_login.php"><div class="recep"><img src="images/receptionist.png" class="icon" alt="iconrp">
			<h2>Recept..</h2>
		</div></a>
		<a href="Wardboy/wb_login.php"><div class="user2"><img src="images/wardboy.png" class="icon" alt="iconwb">
			<h2>Wardboy</h2>
		</div></a>
		<a href="Administrator/admin_login.php"><div class="user2"><img src="images/admin.png" class="icon" alt="iconadmin">
			<h2>Admin</h2>
		</div></a>
	</div>
</body>
</html>