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
	<title>Doctor | Information</title>
	<link rel="stylesheet" type="text/css" href="d.css">
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
	<a href="doctor_edit.php"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Edit Profile <img src="Images/edit.png" id="editpng"> </div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>

	<div class="area">
		<h1 class="htitle">Doctor | Information</h1>
		<?php if (isset($_SESSION['msgsnurse'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsnurse']; 
			unset($_SESSION['msgsnurse']);
		?>
	</div>
	<?php endif?>
		<?php $results = mysqli_query($db, "SELECT * FROM doctor_register where dUsername = '$username'"); ?>
			<table width="60%" class="tbl">
				
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<th class="th">ID</th>
						<td class="td"><?php echo $row['ID']; ?></td>
					</tr>
					<tr>
						<th class="th">Full name</th>
					<td class="td"><?php echo $row['dFull_name']; ?></td>
					</tr>
					<tr>
						<th class="th">Birthday</th>
					<td class="td"><?php echo $row['dBirthday']; ?></td>
					</tr>
					<tr>
						<th class="th">Specialization</th>
						<td class="td"><?php echo $row['dSpecialization']; ?></td>
					</tr>
					<tr>
						<th class="th">Schedule</th>
						<td class="td"><?php echo $row['dSchedule']; ?></td>
					</tr>
					<tr>
						<th class="th">Address</th>
						<td class="td"><?php echo $row['dAddress']; ?></td>
					</tr>
					<tr>
						<th class="th">Contact No.</th>
						<td class="td"><?php echo $row['dContact_no']; ?></td>
					</tr>
					<tr>
						<th class="th">Email Address</th>
						<td class="td"><?php echo $row['dEmail_Add']; ?></td>
					</tr>
					<tr>
						<th class="th">Username</th>
						<td class="td"><?php echo $row['dUsername']; ?></td>
					</tr>

					
				<?php } ?>
				</table>
	</div>
	<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="appointment_doctor.php">Appointment History</a></li>
			<li><a href="viewmed.php" style="font-size: 15px">Patient's Diagnostic Report</a></li>
			<li><a href="medprescription.php" style="font-size: 13px;">Medical Prescription and Findings</a></li>
		</ul>
	</div>


</body>
</html>