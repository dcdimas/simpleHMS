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
	<title>Patient | Edit Profile</title>
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
	<div class="area">
		<h1 id="htitle">Patient | Edit Profile</h1>

<?php if (isset($_SESSION['wrongcombi'])): ?>
	<div style="color: red; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid red; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['wrongcombi']; 
			unset($_SESSION['wrongcombi']);
		?>
	</div>
	<?php endif?>

		<form action="patient_edit.php" method="post">
	<?php $results = mysqli_query($db, "SELECT * FROM patient_register  where pUsername = '$username'"); ?>

	<?php while ($row = mysqli_fetch_array($results)) { ?>

		<p>Complete the information below.</p>
		<div class="edit">
			<div class="edit">
			<input type="hidden" name="id" value="<?php echo $row['ID']; ?>" >
		</div>
		<div class="edit">
			<label for="fullname">Full name:</label>
			<input type="text" name="fullname" value="<?php echo $row['pFull_name']; ?>" required/ >
		</div>
		<div class="edit">
			<label for="bday">Birthday:</label>
			<input type="date" name="bday" value="<?php echo $row['pBirthday']; ?>" required/>
		</div>
		<div class="edit">
			<label for="age">Age:</label>
			<input type="text" name="age" value="<?php echo $row['pAge']; ?>" required/>
		</div>
		<div class="edit">
			<label for="sex">Sex:</label>
			<input type="text" name="sex" placeholder="Female/Male" value="<?php echo $row['pSex']; ?>" required/>
		</div>
		<div class="edit">
			<label for="address">Address:</label>
			<input type="text" name="address" value="<?php echo $row['pAddress']; ?>" required/>
		</div>
		<div class="edit">
			<label for="contact">Contact number:</label>
			<input type="text" name="contact" value="<?php echo $row['pContact_no']; ?>" required/>
		</div>
		<div class="edit">
			<label for="email">Email Address:</label>
			<input type="email" name="email" value="<?php echo $row['pEmail_add']; ?>" >
		</div>
		<div class="edit">
			<label for="username">Username:</label>
			<input type="text" name="username" readonly value="<?php echo $row['pUsername']; ?>" required/>
		</div>
		<div class="edit">
			<label for="pass1">Password:</label>
			<input type="password" name="pass1" value="<?php echo $row['pPassword']; ?>" required/>
		</div>
		<div class="edit">
			<label for="pass2">Confirm Password:</label>
			<input type="password" name="pass2"  required/>
		</div>
		<div class="edit">
		<button type="submit" name="submit" class="btn">Save</button>
		<?php if(isset($_POST['submit']))
{
		$id = $_POST['id'];
		$Full_name =$_POST['fullname'];
		$Birthday = $_POST['bday'];
		$age = $_POST['age'];
		$Sex = $_POST['sex'];
    	$Address = $_POST['address'];
		$Contact_no = $_POST['contact'];
		$Email_Add = $_POST['email'];
		$Username = $_POST['username'];
		$Password1 = $_POST['pass1'];
		$Password2 = $_POST['pass2'];


		if ($Password1 != $Password2) {
			$_SESSION['wrongcombi'] = "Password did not match"; 
			header('location: patient_edit.php');
			# code...
		} else {


		$sql=mysqli_query($db,"UPDATE patient_register set pFull_name='$Full_name', pAge = '$age', pBirthday='$Birthday', pSex='$Sex', pAddress='$Address', pContact_no='$Contact_no', pEmail_add='$Email_Add', pUsername='$Username', pPassword='$Password1' WHERE ID = '$id'");
		$_SESSION['msgs'] =  "Updated succesfully!";
		header('location: home.php');
	} 
}
?>

		</div>
		</div>
		<?php } ?>
	</form>
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