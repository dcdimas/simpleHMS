<?php include('server.php'); ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Patient | Registration</title>
	<link rel="stylesheet" type="text/css" href="patient_register.css">
</head>
<body>

		<div class="heading">
			<img src="images/hospital.png" id="hospital"> 
			<h2 id="welcome">Patient | Register here</h2>
		</div>

	<form action="patient_register.php" method="post">
	<?php include('errors.php'); ?> 
		<p>Complete the information below.</p>
		<div class="register">
		<div class="register">
			<label for="fullname">Full name:</label>
			<input type="text" name="fullname" >
		</div>
		<div class="register">
			<label for="bday">Birthday:</label>
			<input type="date" name="bday">
		</div>
		<div class="register">
			<label for="age">Age:</label>
			<input type="text" name="age">
		</div>
		<div class="register">
			<label for="sex">Sex:</label>
			<input type="text" name="sex" placeholder="Female/Male" >
		</div>
		<div class="register">
			<label for="address">Address:</label>
			<input type="text" name="address">
		</div>
		<div class="register">
			<label for="contact">Contact number:</label>
			<input type="text" name="contact">
		</div>
		<div class="register">
			<label for="email">Email Address:</label>
			<input type="email" name="email">
		</div>
		<div class="register">
			<label for="username">Username:</label>
			<input type="text" name="username">
		</div>
		<div class="register">
			<label for="pass1">Password:</label>
			<input type="password" name="pass1">
		</div>
		<div class="register">
			<label for="pass2">Confirm password:</label>
			<input type="password" name="pass2">
		</div>
		<div class="register">
		<button type="submit" name="save" class="btn">Register</button>
		</div>
		</div>
		<p>Already have an account? <a href="patient_login.php"class="none">Log in.</a></p>
	</form>

</body>
</html>