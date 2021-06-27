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
	<title>Nurse | Edit Profile</title>
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
		<h1 class="htitle">Nurse | Edit Profile</h1>

  	<?php if (isset($_SESSION['wrongcombi'])): ?>
	<div style="color: red; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid red; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['wrongcombi']; 
			unset($_SESSION['wrongcombi']);
		?>
	</div>
	<?php endif?>

		<form action="nurse_edit.php" method="post" class="form">
	<?php $results = mysqli_query($db, "SELECT * FROM nurse_register  where nUsername = '$username'"); ?>

	<?php while ($row = mysqli_fetch_array($results)) { ?>

		<p>Complete the information below.</p>
		<div class="edit">
			<div class="edit">
			<input type="hidden" name="id" value="<?php echo $row['ID']; ?>" >
		</div>
		<div class="edit">
			<label for="fullname">Full name:</label>
			<input type="text" name="fullname" value="<?php echo $row['nFull_name']; ?>" required/ >
		</div>
		<div class="edit">
			<label for="bday">Birthday:</label>
			<input type="date" name="bday" value="<?php echo $row['nBirthday']; ?>" required/>
		</div>
		<div class="edit">
			<label for="sched">Schedule:</label>
			<textarea name="sched" class="edit" cols="50" rows="10" required/><?php echo $row['nSchedule']; ?></textarea>
		</div>
		
		<div class="edit">
			<label for="address">Address:</label>
			<input type="text" name="address" value="<?php echo $row['nAddress']; ?>" required/>
		</div>
		<div class="edit">
			<label for="contact">Contact number:</label>
			<input type="text" name="contact" value="<?php echo $row['nContact_no']; ?>" required/>
		</div>
		<div class="edit">
			<label for="email">Email Address:</label>
			<input type="email" name="email" value="<?php echo $row['nEmail_Add']; ?>" >
		</div>
		<div class="edit">
			<label for="username">Username:</label>
			<input type="text" name="username" readonly value="<?php echo $row['nUsername']; ?>" required/>
		</div>
		<div class="edit">
			<label for="pass1">Password:</label>
			<input type="password" name="pass1" value="<?php echo $row['nPassword']; ?>" required/>
		</div>
		<div class="edit">
			<label for="pass2">Confirm Password:</label>
			<input type="password" name="pass2"  required/>
		</div>
		<div class="edit">
		<button type="submit" name="submitnurse" class="btn">Save</button>
		<?php if(isset($_POST['submitnurse']))
{
		$id = $_POST['id'];
		$Full_name =$_POST['fullname'];
		$Birthday = $_POST['bday'];
		$sched = $_POST['sched'];
    	$Address = $_POST['address'];
		$Contact_no = $_POST['contact'];
		$Email_Add = $_POST['email'];
		$Username = $_POST['username'];
		$Password1 = $_POST['pass1'];
		$Password2 = $_POST['pass2'];

		if ($Password1 != $Password2) {
			$_SESSION['wrongcombi'] = "Password did not match"; 
			header('location: nurse_edit.php');
			# code...
		} else {


		$sql=mysqli_query($db,"UPDATE nurse_register set nFull_name='$Full_name',nBirthday='$Birthday', nSchedule = '$sched',nAddress='$Address', nContact_no='$Contact_no', nEmail_Add='$Email_Add', nUsername='$Username', nPassword='$Password1' WHERE ID = '$id'");
		$_SESSION['msgsnurse'] =  "Updated succesfully!";
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
			<li><a href="npatient_list.php" style="font-size: 15px">Patient's Personal Information</a></li>
			<li><a href="viewmed.php">Patient's Records</a></li>
			<li><a href="ndiagnostics.php" style="font-size: 15px;">Record Diagnostic Report</a></li>
		</ul>
	</div>

</body>
</html>