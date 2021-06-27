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
	<title>Book Appointment</title>
	<link rel="stylesheet" type="text/css" href="r.css">
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
	<a href="recep_edit.php"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Edit Profile <img src="Images/edit.png" id="editpng"> </div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>

	<div class="area">
		<h1 class="htitle">Book Appointment</h1>
		<?php if (isset($_SESSION['msgrecep'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgrecep']; 
			unset($_SESSION['msgrecep']);
		?>
	</div>
	<?php endif?>
		<form action="book_appointment.php" method="post" class="form">
		<div class="edit">
			<label for="pid">Patient ID:</label>
			<input type="number" name="pid" required/>
		</div>
		<div class="edit">
			<label for="pname">Patient Name:</label>
			<input type="text" name="pname" required/>
		</div>
		<div class="edit">
			<label for="did">Doctor ID:</label>
			<input type="text" name="did" required/>
		</div>
		<div class="edit">
			<label for="dname">Doctor Name:</label>
			<input type="text" name="dname" required/>
		</div>
		<div class="edit">
			<label for="ms">Medical Specialization:</label>
			<input type="text" name="ms" required/>
		</div>
		<div class="edit">
			<label for="as">Appointment Schedule:</label>
			<textarea name="as" class="edit" cols="70" rows="10" placeholder="00:00am - 00:00pm / Monday"  required/></textarea>
		</div>
		<div class="edit">
		<button type="submit" name="submitrecep" class="btn">Save</button>
		</div>
		<?php if(isset($_POST['submitrecep']))
{
		$id = $_POST['pid'];
		$Full_name =$_POST['pname'];
		$did = $_POST['did'];
		$spec = $_POST['ms'];
		$doc = $_POST['dname'];
		$appoint = $_POST['as'];


		$sql=mysqli_query($db,"INSERT INTO appointment (Patient_id, Patient_name, doc_id, doctor_name, specialization,  appoint_sched)VALUES ('$id', '$Full_name', '$did', '$doc', '$spec',  '$appoint' )");
		$_SESSION['msgrecep'] =  "Added succesfully!";
		header('location: book_appointment.php');
	}
?>
	</form>
	</div>
	<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="rdoctor_sched.php">Doctor's Schedule</a></li>
			<li><a href="rnurse_schedule.php">Nurse's Schedule</a></li>
			<li><a href="book_appointment.php">Book Appointment</a></li>
		
		</ul>
	</div>


</body>
</html>