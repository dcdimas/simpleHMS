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
	<title>Doctor | Findings&Prescription</title>
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
		<h1 class="htitle">Doctor | Findings&Prescription</h1>

		<form action="medprescription.php" method="post" class="form">
			<div class="edit">
			<label for="did">Doctor ID:</label>
			<input type="number" name="did" required/>
		</div>
			<div class="edit">
			<label for="dname">Doctor Name:</label>
			<input type="text" name="dname" required/>
		</div>
		<hr>
		<div class="edit">
			<label for="dnum">Diagnosis #:</label>
			<input type="number" name="dnum" required/>
		</div>
		<div class="edit">
			<label for="id">Patient ID:</label>
			<input type="number" name="id" required/>
		</div>
		<div class="edit">
			<label for="name">Patient Name:</label>
			<input type="text" name="name" required/>
		</div>
		<div class="edit">
			<label for="finds">Findings:</label>
			<textarea name="finds" class="edit" cols="80" rows="10" required/></textarea>
		</div>
		<div class="edit">
			<label for="pres">Prescriptions:</label>
			<textarea name="pres" class="edit" cols="80" rows="10" required/></textarea>
		</div>
	

		<input type="submit" name="submitbtnssdoc" class="btn" value="save">
		</form>


		<?php
			if (isset($_POST['submitbtnssdoc'])) {
				$did = $_POST['did'];
				$dname = $_POST['dname'];
				$dnum = $_POST['dnum'];
				$id = $_POST['id'];
				$name = $_POST['name'];
				$finds = $_POST['finds'];
				$pres = $_POST['pres'];
				
				
				



				mysqli_query($db, "INSERT INTO patient_medpres (doc_id, doctor_name, diagnosisIDs, IDs, pFull_names, pMed_findings, pMed_prescription) VALUES ( '$did', '$dname','$dnum', '$id', '$name', '$finds', '$pres')");//"UPDATE patient_medhis set pMed_findings = '$finds', pMed_prescription = '$pres'  where ID =  '$id'");
				 $_SESSION['msgs'] =  "Recorded succesfully!";
				header('location: viewmed.php');
			}
		?>




		</div>

<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="appointment_doctor.php">Appointment History</a></li>
			<li><a href="viewmed.php" style="font-size: 15px">Patient's Diagnostic Report</a></li>
			<li><a href="medprescription.php" style="font-size: 13px;">Medical Prescription and Findings</a></li>
		</ul>
	</div>