<?php include ('server.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor | Log in</title>
	<link rel="stylesheet" type="text/css" href="doctor_login.css">
</head>
<body>
		<div class="heading">
			<img src="images/hospital.png" id="hospital"> 
			<h1 id="welcome">Doctor | Log in</h1>
		</div>
	<form action="doctor_login.php" method="post">
		<?php if (isset($_SESSION['messdoc'])): ?>
	<div style="color: #416788; font-family: helvetica; font-size: 15px; font-weight: bold;" >
		<?php 
			echo $_SESSION['messdoc']; 
			unset($_SESSION['messdoc']);
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
		<p style="font-size: 15px">Doesn't have an account? <a href="doctor_register.php">Sign up here.</a></p>
		
	</form>

</body>
</html>
</body>
</html>