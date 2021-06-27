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
	<title>Room Schedule</title>
	<link rel="stylesheet" type="text/css" href="wb.css">
</head>
<body>

		<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
	</div>
	<div id="username" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 20px;">
		<img src="Images/user.png" id="userpng">
		<?php echo $_SESSION ['username'];?>

	</div>
	<div>
	<a href="wb_edit.php"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Edit Profile <img src="Images/edit.png" id="editpng"> </div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>

	<div class="area">
		<h1 class="htitle">Room Schedule</h1>
		<?php if (isset($_SESSION['msgsnurse'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsnurse']; 
			unset($_SESSION['msgsnurse']);
		?>
	</div>
	<?php endif?>
		<?php $results = mysqli_query($db, "SELECT ID, pFull_name, pDate_admitted, pRoom_no, pDate_discharged FROM patient_medhis WHERE pDate_admitted != 0"); ?>
			<table width="60%" class="tbl">
				
	
			<table width="80%" class="tbl">
				
				<tr class="tr">
						<th class="th">Patient ID</th>
						<th class="th">Patient Name</th>
						<th class="th">Date Admitted</th>
						<th class="th">Room No.</th>
						<th class="th">Date Discharged</th>
					</tr>
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					
					<tr class="tr">
						<td class="td"><?php echo $row['ID']; ?></td>
						<td class="td"><?php echo $row['pFull_name']; ?></td>
						<td class="td"><?php echo $row['pDate_admitted']; ?></td>
						<td class="td"><?php echo $row['pRoom_no']; ?></td>
						<td class="td"><?php echo $row['pDate_discharged']; ?></td>
						
					</tr>
					
				<?php } ?>
				</table>
	</div>
	<div id="menulist">
		<ul>
			<li><a href="home.php">Personal Information</a></li>
			<li><a href="room_sched.php">Room Schedule</a></li>
			
		
		</ul>
	</div>


</body>
</html>