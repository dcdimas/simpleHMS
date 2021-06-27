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
	<title>COVID-19 Case | Update</title>
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
		<h1 class="htitle">COVID-19 Case | Update</h1>

		<form action="covidup.php" method="post" class="form">
		<div class="edit">
			<label for="pID">Patient ID:</label>
			<input type="text" name="pID" required/>
		</div>
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
		<div class="edit">
			<label for="dc">Date Confirmed:</label>
			<input type="datetime-local" name="dc">
		</div>
		<div class="edit">
			<label for="tr">COVID-19 Test Result:</label>
			<input type="text" name="tr">
		</div>
		<div class="edit">
			<label for="pc">COVID-19 Patient Condition:</label>
			<textarea name="pc" class="edit" cols="80" rows="10"></textarea>
		</div>
		<input type="submit" name="submitbtns" class="btn" value="save">
		</form>


		<?php
			if (isset($_POST['submitbtns'])) {
				$id = $_POST['pID'];
				$th = $_POST['th'];
				$covidclass = $_POST['covidclass'];
				$dc = $_POST['dc'];
				$tr = $_POST['tr'];
				$pc = $_POST['pc'];

				mysqli_query($db, "UPDATE patient_medhis set pTravel_history = '$th', pModified_classification = '$covidclass', pDate_confirmed = '$dc', pTest_results = '$tr', pCondition = '$pc' where ID = '$id'" );
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