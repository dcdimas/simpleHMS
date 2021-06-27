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
	<title>Your Medical History</title>
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
<div id="area2">
		<h1 id="htitle">Your Medical History</h1>

		<p style="font-family: helvetica; font-size: 15px;margin-top: 20px; display: block; text-indent:20px;">Are you a COVID-19 case? <a href="pcovidcase.php">Click here.</a></p>

		<?php $results = mysqli_query($db, "SELECT patient_register.ID, patient_register.pUsername, patient_register.pFull_name, patient_medhis.diagnosisID, patient_medhis.Nurse_name, patient_medpres.IDs, patient_medpres.doctor_name , patient_medpres.pMed_findings, patient_medpres.pMed_prescription, patient_medhis.ID, patient_medhis.pVisit_date, patient_medhis.pFull_name, patient_medhis.pAge, patient_medhis.pWeight, patient_medhis.pHeight, patient_medhis.pBlood_pressure, patient_medhis.pBlood_sugar, patient_medhis.pBody_temperature, patient_medhis.pSymptoms, patient_medhis.pDate_admitted, patient_medhis.pRoom_no, patient_medhis.pDate_discharged FROM patient_register JOIN patient_medpres ON patient_medpres.IDs = patient_register.ID JOIN patient_medhis ON patient_register.ID=patient_medhis.ID WHERE pUsername = '$username'")?>
			<table width="90%" class="tbl2">
				
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr >
						<th style="padding: 20px; border-top: 1px solid white; border-right: 1px solid white; border-left: 1px solid white; border-bottom: 1px solid #b5bad0"></th>
					</tr>
					<tr>
						<th colspan="1" class="th2" >Diagnosis #</th>
						<td colspan="3" class="td2"><?php echo $row['diagnosisID']; ?></td>
					</tr>
					<tr>
						<th colspan="1" class="th2" >Nurse Name</th>
						<td colspan="3" class="td2" ><?php echo $row['Nurse_name']; ?></td>
					</tr>
					<tr>
						<th colspan="1" class="th2" >Doctor Name</th>
						<td colspan="3" class="td2"><?php echo $row['doctor_name']; ?></td>
					</tr>
					<tr>
						<th class="th2">Visited Date</th>
						<td class="td2"><?php echo $row['pVisit_date']; ?></td>
						<th class="th2">Blood Pressure</th>
						<td class="td2"><?php echo $row['pBlood_pressure']; ?></td>
					</tr>
					<tr>
						<th class="th2">Full name</th>
						<td class="td2"><?php echo $row['pFull_name']; ?></td>
						<th class="th2">Blood Sugar level</th>
						<td class="td2"><?php echo $row['pBlood_sugar']; ?></td>
					</tr>
					<tr>
						<th class="th2">Weight</th>
						<td class="td2"><?php echo $row['pWeight']; ?></td>
						<th class="th2">Height</th>
						<td class="td2"><?php echo $row['pHeight']; ?></td>
					<tr>
					</tr>
						<th class="th2">Symptoms</th>
						<td class="td2" colspan="3"><?php echo $row['pSymptoms']; ?></td>
						
					</tr>
					</tr>
						<th class="th2">Doctor Name</th>
						<td class="td2" colspan="3"><?php echo $row['doctor_name']; ?></td>
						
					</tr>
					<tr>
						<th class="th2" colspan="2" style="text-align: center; border-right: 1px solid #b5bad0">Medical Findings</th>
						<th class="th2" colspan="2" style="text-align: center; padding: 5px">Medical Prescription</th>
					</tr>
					<tr>
						<td class="td2"colspan="2" style="border-right: 1px solid #b5bad0"><?php echo $row['pMed_findings']; ?></td>
						<td class="td2"colspan="2"><?php echo $row['pMed_prescription']; ?></td>
					</tr>
					<tr>
						<th class="th2">Date Admitted</th>
						<td class="td2"><?php echo $row['pDate_admitted']; ?></td>
						<th class="th2">Room No.</th>
						<td class="td2"><?php echo $row['pRoom_no']; ?></td>
						
					</tr>
					<tr>
						<th class="th2">Date Discharged</th>
						<td class="td2" colspan="3"><?php echo $row['pDate_discharged']; ?></td>
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