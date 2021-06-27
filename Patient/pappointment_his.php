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
	<link rel="stylesheet" type="text/css" href="p.css">
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
	<a href="patient_edit.php"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Edit Profile <img src="Images/edit.png" id="editpng"> </div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>
	</div>
	<div class="area">
		<h1 id="htitle">Appointment History</h1>

		<?php if (isset($_SESSION['msgs'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgs']; 
			unset($_SESSION['msgs']);
		?>
	</div>
	<?php endif?>
		<?php $results = mysqli_query($db, "SELECT patient_register.ID, patient_register.pFull_name, patient_register.pUsername, appointment.No, appointment.Patient_id, appointment.Patient_name, appointment.doc_id, appointment.doctor_name, appointment.specialization, appointment.appoint_sched FROM patient_register JOIN appointment ON appointment.Patient_id = patient_register.ID  where pUsername = '$username'"); ?>
			<table width="80%" class="tbl">
				
						<tr>
							<th class="th">Patient ID</th>
							<th class="th">Patient Name</th>
							<th class="th">Doctor Name</th>
							<th class="th">Specialization</th>
							<th class="th">Appointment Schedule</th>
						</tr>
				<?php while ($row = mysqli_fetch_array($results)) { ?>

					<tr class="tr">
						
						<td class="td"><?php echo $row['ID']; ?></td>
					
					
						<td class="td"><?php echo $row['pFull_name']; ?></td>
					
						
						<td class="td"><?php echo $row['doctor_name']; ?></td>
					
					
						<td class="td"><?php echo $row['specialization']; ?></td>
					
					
						<td class="td"><?php echo $row['appoint_sched']; ?></td>
					</tr>
					
				<?php } ?>
				</table>
	</div>

	<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="pview_medhis.php">Medical History</a></li>
			<li><a href="pappointment_his.php">Appointment History</a></li>
		</ul>
	</div>
</body>
</html>