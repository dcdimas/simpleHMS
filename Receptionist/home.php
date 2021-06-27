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
	<title>Receptionist | Information</title>
	<link rel="stylesheet" type="text/css" href="r.css">
</head>
<body>

		<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
	</div>
	<div id="username" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 15px;">
		<img src="Images/user.png" id="userpng">
		<?php echo $_SESSION ['username'];?>

	</div>
	<div>
	<a href="recep_edit.php"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Edit Profile <img src="Images/edit.png" id="editpng"> </div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>

	<div class="area">
		<h1 class="htitle">Receptionist | Information</h1>
		<?php if (isset($_SESSION['msgsnurse'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsnurse']; 
			unset($_SESSION['msgsnurse']);
		?>
	</div>
	<?php endif?>
		<?php $results = mysqli_query($db, "SELECT * FROM recep_register where rUsername = '$username'"); ?>
			<table width="60%" class="tbl">
				
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<th class="th">ID</th>
						<td class="td"><?php echo $row['ID']; ?></td>
					</tr>
					<tr>
						<th class="th">Full name</th>
					<td class="td"><?php echo $row['rFull_name']; ?></td>
					</tr>
					<tr>
						<th class="th">Birthday</th>
					<td class="td"><?php echo $row['rBirthday']; ?></td>
					</tr>
					
					<tr>
						<th class="th">Schedule</th>
						<td class="td"><?php echo $row['rSchedule']; ?></td>
					</tr>
					<tr>
						<th class="th">Address</th>
						<td class="td"><?php echo $row['rAddress']; ?></td>
					</tr>
					<tr>
						<th class="th">Contact No.</th>
						<td class="td"><?php echo $row['rContact_no']; ?></td>
					</tr>
					<tr>
						<th class="th">Email Address</th>
						<td class="td"><?php echo $row['rEmail_Add']; ?></td>
					</tr>
					<tr>
						<th class="th">Username</th>
						<td class="td"><?php echo $row['rUsername']; ?></td>
					</tr>

					
				<?php } ?>
				</table>
	</div>
	<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="rdoctor_sched.php">Doctor's Schedule</a></li>
			<li><a href="rnurse_schedule.php">Nurse's Schedule</a></li>
			<li><a href="book_appointment.php">Book Appointment</a></li>
		
		</ul>
	</div>


</body>
</html>