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
	<title>Date | Update</title>
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
	<a href="nurse_edit.php"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Edit Profile <img src="Images/edit.png" id="editpng"> </div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>
	</div>
	<div class="area">
		<h1 class="htitle">Date | Update</h1>

		<form action="dateup.php" method="post" class="form">
		<div class="edit">
			<label for="id">Patient ID:</label>
			<input type="number" name="id">
		</div><div class="edit">
			<label for="da">Date Admitted:</label>
			<input type="datetime-local" name="da">
		</div>
		<div class="edit">
			<label for="rn">Room no:</label>
			<input type="text" name="rn">
		</div>
		<div class="edit">
			<label for="dd">Date Discharged:</label>
			<input type="datetime-local" name="dd">
		</div>
	

		<input type="submit" name="submitbtnss" class="btn" value="save">
		</form>


		<?php
			if (isset($_POST['submitbtnss'])) {
				
				$id = $_POST['id'];
				
				$da = $_POST['da'];
				$rn = $_POST['rn'];
				$dd = $_POST['dd'];
				


				mysqli_query($db, "UPDATE patient_medhis set pDate_admitted = '$da', pRoom_no = '$rn', pDate_discharged = '$dd' where ID =  '$id'");
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