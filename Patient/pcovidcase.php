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
	<title>COVID-19 | Information</title>
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
		<h1 id="htitle">COVID-19 | Information</h1>

		<?php $results = mysqli_query($db, "SELECT patient_register.ID, patient_register.pUsername, patient_medhis.ID, patient_medhis.pVisit_date, patient_medhis.pTravel_history, patient_medhis.pModified_classification, patient_medhis.pDate_confirmed, patient_medhis.pTest_results, patient_medhis.pCondition 
			FROM patient_register
			JOIN patient_medhis
			ON patient_register.ID = patient_medhis.ID where pUsername = '$username'"); ?>
			<table width="70%" class="tbl">
				<thead>
					<tr>
						<th class="th">Date visited</th>
						<th class="th">Travel History</th>
						<th class="th">COVID-19<br>Modified<br>Classification</th>
						<th class="th">Confirmed<br> date</th>
						<th class="th">COVID-19<br>Test<br>Result</th>
						<th class="th">COVID-19<br>Patient<br>Condition</th>
					</tr>
				</thead>
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td class="td"><?php echo $row['pVisit_date']; ?></td>
						<td class="td"><?php echo $row['pTravel_history']; ?></td>
						<td class="td"><?php echo $row['pModified_classification']; ?></td>
						<td class="td"><?php echo $row['pDate_confirmed']; ?></td>
						<td class="td"><?php echo $row['pTest_results']; ?></td>
						<td class="td"><?php echo $row['pCondition']; ?></td>
						
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