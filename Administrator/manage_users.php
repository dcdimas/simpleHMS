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
	<title>Manage Users</title>
	<link rel="stylesheet" type="text/css" href="a.css">
</head>
<body>

		<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
	</div>
		</h1>
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
		<h1 class="htitle">Manage Users</h1>
		<div class="indivs">
		<a href="patient_list.php" style="text-decoration: none;"><div class="adbtn">
				<img src="Images/patient.png" class="icon"><br>
				<h2 class="titleh2">Patient</h2>
			</div></a>
		</div>
		<div class="indivs">
			<a href="nurse_list.php" style="text-decoration: none;"><div class="adbtn">
				<img src="Images/nurse.png" class="icon"><br>
				<h2 class="titleh2">Nurse</h2>
			</div></a>
		</div>
		<div class="indivs">
			<a href="doctor_list.php" style="text-decoration: none;"><div class="adbtn">
				<img src="Images/doctor.png" class="icon"><br>
				<h2 class="titleh2">Doctor</h2>
			</div></a>
		</div>
		<div class="indivs">
			<a href="receptionist_list.php" style="text-decoration: none;"><div class="adbtn">
				<img src="Images/receptionist.png" class="icon"><br>
				<h2 class="titleh">Receptionist</h2>
			</div></a>
		</div>
		<div class="indivs">
		<div class="adbtn">
				<a href="wardboy_list.php" style="text-decoration: none;"><img src="Images/wardboy.png" class="icon"><br>
				<h2 class="titleh2">Wardboy</h2>
			</div></a>
		</div>
		<div class="indivs">
			<div class="adbtn">
				<a href="admin_list.php" style="text-decoration: none;"><img src="Images/admin.png" class="icon"><br>
				<h2 class="titleh">Add/Remove Admin</h2>
			</div>
		</div>
	</div>
	<div id="menulist">
		<ul>
			<li><a href="home.php">Admin Profile</a></li>
			<li><a href="manage_users.php">Manage Users</a></li>
			
		
		</ul>
	</div>


</body>
</html>