<?php include('code.php'); ?>

<?php
ob_start();
if (!isset($_SESSION['username'])) {
	header("location: ../index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient | Diagnostic Report</title>
	<link rel="stylesheet" type="text/css" href="n.css">
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
		<h1 class="htitle">Patient | Diagnostic Report</h1>

		<form action="ndiagnostics.php" method="post" class="form">
		<div class="edit">
			<label for="nid">Nurse ID:</label>
			<input type="number" name="nid" required/>
		</div>
		<div class="edit">
			<label for="nname">Nurse Full Name:</label>
			<input type="text" name="nname" required/>
		</div>
		<br>
		<hr>
		<div class="edit">
			<label for="id">Patient ID:</label>
			<input type="number" name="id" required/>
		</div>
		<div class="edit">
			<label for="date">Visit Date:</label>
			<input type="datetime-local" name="date">
		</div>
		<div class="edit">
			<label for="pname">Full Name:</label>
			<input type="text" name="pname" required/>
		</div>
		<div class="edit">
			<label for="age">Age:</label>
			<input type="text" name="age" >
		</div>
		<div class="edit">
			<label for="weight">Weight:</label>
			<input type="text" name="weight" value="   kg">
		</div>
		<div class="edit">
			<label for="height">Height:</label>
			<input type="text" name="height" value ="   ft">
		</div>
		<div class="edit">
			<label for="bp">Blood Pressure:</label>
			<input type="text" name="bp" value="   /   ">
		</div>
		<div class="edit">
			<label for="bs">Blood Sugar Level:</label>
			<input type="text" name="bs">
		</div>
		<div class="edit">
			<label for="bt">Body Temperature:</label>
			<input type="text" name="bt" value="   deg">
		</div>
		<div class="edit"> 
			<label for="symp">Symptoms:</label>
			<textarea name="symp" class="edit" cols="80" rows="10"></textarea>
		</div>
		<div class="edit">
			<hr>
			<br>
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
		<br>
		<hr>
		<br>
		<h1 style="font-family: Helvetica; color: #5d576b">COVID-19 CASE</h1>
		<div class="edit">
			<label for="th">Travel History:</label>
			<input type="text" name="th">
		</div>
		<div >
			<input type="radio" name="covidclass" value="SUSPECT"> SUSPECT<br>
			<p style="font-size: 12px; color: red">**These are those who exibit the symptoms like fever, cough, breathing difficulty and those who belong in the vulnerable group such as 60 years old and older, have pre-existing medical conditions, pregnant and a health worker. Also those people who suddenly developed a sudden lung problem with severe symptoms and needed to be hospitalized. They also be those with symptoms and has a travel history to places with local transmission of COVID-19 or had a close contact with a confirmed or probable COVID-19 individual.</p><br>
			<input type="radio" name="covidclass" value="PROBABLE"> PROBABLE<br>
			<p style="font-size: 12px; color: red">**Those who have pending test results or whose tests were conducted in an unofficial testing laboratory.</p><br>
			<input type="radio" name="covidclass" value="CONFIRMED"> CONFIRMED<br>
			<p style="font-size: 12px; color: red">**Individuals who tested positive for the COVID-19 will be classified as confirmed cases.</p><br>
		</div>

		<input type="submit" name="submitbtn" class="btn" value="save">
		</form>


		<?php
			if (isset($_POST['submitbtn'])) {
				$nid = $_POST['nid'];
				$nname = $_POST['nname'];
				$id = $_POST['id'];
				$vd = $_POST['date'];
				$name = $_POST['pname'];
				$age = $_POST['age'];
				$weight = $_POST['weight'];
				$height = $_POST['height'];
				$bp = $_POST['bp'];
				$bs = $_POST['bs'];
				$bt = $_POST['bt'];
				$symp = $_POST['symp'];
				$da = $_POST['da'];
				$rn = $_POST['rn'];
				$dd = $_POST['dd'];
				$th = $_POST['th'];
				$covidclass = $_POST['covidclass'];


				mysqli_query($db, "INSERT INTO patient_medhis (NurseID, Nurse_name, ID, pVisit_date, pFull_name, pAge, pWeight, pHeight, pBlood_pressure, pBlood_sugar, pBody_temperature, pSymptoms, pDate_admitted, pRoom_no, pDate_discharged, pTravel_history, pModified_classification ) VALUES ('$nid', '$nname', '$id', '$vd', '$name', '$age', '$weight', '$height', '$bp', '$bs', '$bt', '$symp', '$da','$rn', '$dd', '$th', '$covidclass')");
				 $_SESSION['msgs'] =  "Recorded succesfully!";
				header('location: viewmed.php');
			}
		?>




		</div>

<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="npatient_list.php" style="font-size: 15px">Patient's Personal Information</a></li>
			<li><a href="viewmed.php">Patient's Records</a></li>
			<li><a href="ndiagnostics.php" style="font-size: 15px;">Record Diagnostic Report</a></li>
		</ul>
	</div>