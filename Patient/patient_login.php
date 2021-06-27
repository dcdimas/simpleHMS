<?php include ('server.php')?> 
<!DOCTYPE html>
<html>
<head>
	<title>Patient | Log in</title>
	<link rel="stylesheet" type="text/css" href="patient_login.css">

</head>
<body>
		<div class="heading">
			<img src="images/hospital.png" id="hospital"> 
			<h1 id="welcome">Patient | Log in</h1>
		</div>
	<form action="patient_login.php" method="post">
		<?php if (isset($_SESSION['mess'])): ?>
	<div style="color: #416788; font-family: helvetica; font-size: 15px; font-weight: bold;" >
		<?php 
			echo $_SESSION['mess']; 
			unset($_SESSION['mess']);
		?>
	</div>
	<?php endif?>

			<?php include ('errors.php')?>
			<p style="font-family: verdana; font-size: 12px;">Please enter your name and password to login.</p>
		<div class="loginadmin">
			<div class="loginadmin">
			<input type="text" name="username" placeholder="Username">
		</div>
		<div class="loginadmin">
			<input type="password" name="pass" placeholder="Password">
		</div>
		<div class="loginadmin">
		<button type="submit" name="Login_admin" class="btn">Login</button>
		<br>
		</div>
		</div>
		<p style="font-size: 15px">Doesn't have an account? <a href="patient_register.php">Sign up here.</a></p>
		
	</form>

</body>
</html>
</body>
</html>