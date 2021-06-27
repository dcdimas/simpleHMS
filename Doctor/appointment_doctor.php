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
	<title>Appointment History</title>
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
	</div>
	<div class="area">
		<h1 class="htitle">Appointment History</h1>

		<?php if (isset($_SESSION['msgs'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgs']; 
			unset($_SESSION['msgs']);
		?>
	</div>
	<?php endif?>
		<?php $results = mysqli_query($db, "SELECT doctor_register.ID, doctor_register.dUsername, appointment.No, appointment.Patient_id, appointment.Patient_name, appointment.doc_id, appointment.doctor_name,appointment.specialization, appointment.appoint_sched FROM doctor_register JOIN appointment ON doctor_register.ID = appointment.doc_id   where dUsername = '$username'"); ?>
			<table width="80%" class="tbl">
				
						<tr>
							<th class="th">No.</th>
							<th class="th">Patient Name</th>
							
							
							<th class="th">Appointment Schedule</th>
						</tr>
				<?php while ($row = mysqli_fetch_array($results)) { ?>

					<tr class="tr">
						
						<td class="td"><?php echo $row['No']; ?></td>
					
					
						<td class="td"><?php echo $row['Patient_name']; ?></td>
					
						
					
					
					
						
					
						<td class="td"><?php echo $row['appoint_sched']; ?></td>
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