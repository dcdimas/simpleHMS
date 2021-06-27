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
	<title>Doctor | Schedule</title>
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
		<h1 class="htitle">Doctor | Schedule</h1>
		<div id="search">
			<?php if(isset($_POST['go'])){
			$search = $_POST['search'];
			$sql = "SELECT ID, dFull_name, dSpecialization, dSchedule, dContact_no, dEmail_Add FROM doctor_register  WHERE dFull_name LIKE '%$search%'";
		}else{
			$sql = "SELECT ID, dFull_name, dSpecialization, dSchedule, dContact_no, dEmail_Add FROM doctor_register ";
			$search ="";

		}
			$results = mysqli_query($db, $sql );
		 ?>
			<form method="post" action="rdoctor_sched.php">
			<input type="text" name="search" placeholder="Search by name" value="<?php echo $search;?>">
			<button name="go">go</button>

		</form>
		</div>
		
			<table width="80%" class="tbl">
				
				<tr class="tr">
						<th class="th">Doctor ID</th>
						<th class="th">Full Name</th>
						<th class="th">Specialization</th>
						<th class="th" style="text-align: center;">Schedule</th>
						<th class="th">Contact No.</th>
						<th class="th">Email Address</th>
					</tr>
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					
					<tr class="tr">
						<td class="td"><?php echo $row['ID']; ?></td>
						<td class="td"><?php echo $row['dFull_name']; ?></td>
						<td class="td"><?php echo $row['dSpecialization']; ?></td>
						<td class="td"><?php echo $row['dSchedule']; ?></td>
						<td class="td"><?php echo $row['dContact_no']; ?></td>
						<td class="td"><?php echo $row['dEmail_Add']; ?></td>
					</tr>
				<?php } ?>
				</table>
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