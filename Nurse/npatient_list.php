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
	<title>Patient | Information</title>
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
		<h1 class="htitle">Patient | Information</h1>
		<div id="search">
			<?php if(isset($_POST['go'])){
			$search = $_POST['search'];
			$sql = "SELECT DISTINCT ID, pFull_name, pBirthday, pAge, pSex, pContact_no, pEmail_add, pAddress FROM patient_register  WHERE pFull_name LIKE '%$search%'";
		}else{
			$sql = "SELECT DISTINCT ID, pFull_name, pBirthday, pAge, pSex, pContact_no, pEmail_add, pAddress FROM patient_register ";
			$search ="";
		}
			$results = mysqli_query($db, $sql );
		 ?>
			<form method="post" action="npatient_list.php">
			<input type="text" name="search" placeholder="Search by name" value="<?php echo $search;?>" >
			<button name="go">go</button>

		</form>
		</div>
	
			<table class="tbl">
				<thead>
					<tr>
						<th class="th">ID</th>
						<th class="th">Full Name</th>
						<th class="th">Birthday</th>
						<th class="th">Age</th>
						<th class="th">Sex</th>
						<th class="th">Contact Number</th>
						<th class="th">Email Address</th>
						<th class="th">Address</th>
					
					
					
					</tr>
				</thead>
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr class="tr">
						<!--  -->
						<td class="td"><?php echo $row['ID']; ?></td>
						<td class="td"><?php echo $row['pFull_name']; ?></td>
						<td class="td"><?php echo $row['pBirthday']; ?></td>
						<td class="td"><?php echo $row['pAge']; ?></td>
						<td class="td"><?php echo $row['pSex']; ?></td>
						<td class="td"><?php echo $row['pContact_no']; ?></td>
						<td class="td"><?php echo $row['pEmail_add']; ?></td>
						<td class="td"><?php echo $row['pAddress']; ?></td>
					
					</tr>
				<?php } ?>
				</table>
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