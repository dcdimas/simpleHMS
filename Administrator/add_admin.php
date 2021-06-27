<?php include('code.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
	header("location: ../index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Add</title>
	<link rel="stylesheet" type="text/css" href="a.css">
</head>
<body>

		<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
	</div>
	<div id="username" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 20px;">
		<img src="Images/user.png" id="userpng">
		<?php echo $_SESSION ['username'];?>

	</div>
	<div>
	<a href="#"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;"></div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>

	<div class="area">
		<h1 class="htitle">Admin | Add</h1>
	<form action="add_admin.php" method="post" class="form">
		
			<div class="edit">
			<label for="auser">Admin Username:</label>
			<input type="text" name="auser" required/>
		</div>
			<div class="edit">
			<label for="apass">Password:</label>
			<input type="password" name="apass" required/>
		</div>
		<input type="submit" name="add" value="add" class="btn">
		
	</form>
	</div>

		<?php
			if (isset($_POST['add'])) {
				$user = $_POST['auser'];
				$pass = $_POST['apass'];

				mysqli_query($db, "INSERT INTO admin_login (aUsername, aPassword) VALUES ('$user', '$pass')" );
				 $_SESSION['msgsadminadd'] =  "Added succesfully!";
				header('location: admin_list.php');
			}
		?>


	<div id="menulist">
		<ul>
			<li><a href="home.php">Admin Profile</a></li>
			<li><a href="manage_users.php">Manage Users</a></li>
			
		
		</ul>
	</div>


</body>
</html>