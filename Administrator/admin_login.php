<?php include ('server.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Log in</title>
	<link rel="stylesheet" type="text/css" href="admin_login.css">
</head>
<body>
		<div class="heading">
			<img src="images/hospital.png" id="hospital"> 
			<h1 id="welcome">Administrator | Log in</h1>
		</div>
	<form action="admin_login.php" method="post">
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
	</form>

</body>
</html>
</body>
</html>