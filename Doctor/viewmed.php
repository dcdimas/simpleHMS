<?php include('code.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
	header("location: ../index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

	<title>Patient | Diagnostic Report</title>
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
		<div id="area2">
		<h1 class="htitle">Patient | Diagnostic Report </h1>
		
		<div id="search">
			<?php if(isset($_POST['go'])){
			$search = $_POST['search'];
			$sql = "SELECT doctor_register.ID, appointment.doc_id, patient_medhis.*, patient_medpres.*
			FROM doctor_register
			JOIN appointment ON doctor_register.ID = appointment.doc_id
			JOIN patient_medhis ON appointment.Patient_id = patient_medhis.ID
			LEFT JOIN patient_medpres ON patient_medhis.diagnosisID = patient_medpres.diagnosisIDs
			 WHERE patient_medhis.pFull_name LIKE '%$search%'";
		}else{
			$sql = "SELECT doctor_register.ID, appointment.doc_id, patient_medhis.*, patient_medpres.*
			FROM doctor_register
			JOIN appointment ON doctor_register.ID = appointment.doc_id
			JOIN patient_medhis ON appointment.Patient_id = patient_medhis.ID
			LEFT JOIN patient_medpres ON patient_medhis.diagnosisID = patient_medpres.diagnosisIDs  WHERE dUsername = '$username'";
			$search ="";

		}
			$results = mysqli_query($db, $sql );
		 ?>
			<form method="post" action="viewmed.php">
			<input type="text" name="search" placeholder="Search by patient name" value="<?php echo $search;?>">
			<button name="go">go</button>

		</form>
		</div>
<?php if (isset($_SESSION['msgs'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgs']; 
			unset($_SESSION['msgs']);
		?>
	</div>
	<?php endif?>
			<table width="90%" class="tbl2">
				
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr >
						<th style="padding: 20px; border-top: 1px solid white; border-right: 1px solid white; border-left: 1px solid white; border-bottom: 1px solid #b5bad0"></th>
					</tr>
					<tr >
						<th class="th2" colspan="6" style="padding: 5px; text-align: center; font-size: 15px; background: #fffdd0">Diagnostic Report</th>
					</tr>
					<tr>
						<th  class="th2">Nurse assigned</th>
						<td class="td2" colspan="5"><?php echo $row['Nurse_name']; ?></td>
					</tr>
					<tr>
						<th class="th2">Diagnosis #</th>
						<td class="td2" colspan="5"><?php echo $row['diagnosisID']; ?></td>
					</tr>
					<tr>
						<th class="th2">Visit Date</th>
						<td class="td2" colspan="5"><?php echo $row['pVisit_date']; ?></td>
					</tr>
					<tr>
						<th class="th2" >Patient ID</th>
						<td class="td2" colspan="5"><?php echo $row['ID']; ?></td>
					</tr>
					<tr>
						<th class="th2" style="background: #ccffff">Patient Name</th>
						<td  class = "td2" colspan="5" style="background: #ccffff"><?php echo $row['pFull_name']; ?></td>
					</tr>
					<tr>
						<th class="th2">Age</th>
						<td class="td2"><?php echo $row['pAge']; ?></td>
						<th class="th2" >Weight</th>
						<td class="td2"><?php echo $row['pWeight']; ?></td>
						<th class="th2">Height</th>
						<td class="td2"><?php echo $row['pHeight']; ?></td>
					</tr>
					<tr>
						<th class="th2">Blood Pressure</th>
						<td class="td2"><?php echo $row['pBlood_pressure']; ?></td>
						<th class="th2">Blood Sugar</th>
						<td class="td2"><?php echo $row['pBlood_sugar']; ?></td>
						<th class="th2">Body Temperature</th>
						<td class="td2"><?php echo $row['pBody_temperature']; ?></td>
					</tr>
					<tr>
						<th class="th2">Symptoms</th>
						<td class="td2" colspan="5"><?php echo $row['pSymptoms']; ?></td>
					</tr>
					<tr>
						<th class="th2">Doctor name</th>
						<td class="td2" colspan="5"><?php echo $row['doctor_name']; ?></td>
					</tr>
					<tr>
						<th class="th2" colspan="3" style="text-align: center;">Medical Findings</th>
						<th class="th2" colspan="3" style="text-align: center;">Medical Prescription</th>
					</tr>
					<tr>
						<td class="td2" colspan="3"><?php echo $row['pMed_findings']; ?></td>
						<td class="td2" colspan="3"><?php echo $row['pMed_prescription']; ?></td>
					</tr>
					<tr>
						<th class="th2" colspan="6"  style="text-align: center; color: red">COVID-19 Case</th>
					</tr>
					<tr>
						<th  class="th2">Travel History</th>
						<td colspan="2" class="td2"><?php echo $row['pTravel_history']; ?></td>
						<th class="th2">Modified Classification</th>
						<td colspan="2" class="td2"><?php echo $row['pModified_classification']; ?></td>
					</tr>
					<tr>
						<th class="th2">Date Confirmed</th>
						<td  colspan="2" class="td2"><?php echo $row['pDate_confirmed']; ?></td>
						<th class="th2">Test Results</th>
						<td colspan="2" class="td2"><?php echo $row['pTest_results']; ?></td>
					</tr>
					<tr>
						<th class="th2">Condition</th>
						<td colspan="3" class="td2"><?php echo $row['pCondition']; ?></td>
						<td class="td2" colspan="3" style="border-right: 1px solid black; padding: 10px;"><a href="covidup.php" >Update</a></td>
					</tr>
					<tr >
						<th class="th2" colspan="6" style="padding: 5px; text-align: center; font-size: 15px">Admission Details</th>
					</tr>
					<tr>
						<th class="th2">Date Admitted</th>
						<td colspan="3" class="td2"><?php echo $row['pDate_admitted']; ?></td>
						<th class="th2">Room No.</th>
						<td colspan="3" class="td2"><?php echo $row['pRoom_no']; ?></td>
					</tr>
					<tr>
						<th class="th2">Date Discharged</th>
						<td colspan="3" class="td2"><?php echo $row['pDate_discharged']; ?></td>
						<td class="td2" colspan="3" style="border-right: 1px solid black; padding: 10px;"><a href="dateup.php" >Update</a></td>
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