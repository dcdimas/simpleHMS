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
	<link rel="stylesheet" type="text/css" href="a.css">
</head>
<body>

		<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
		</h1>
	</div>
	<div id="username" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 20px;">
		<img src="Images/user.png" id="userpng">
		<?php echo $_SESSION ['username'];?>

	</div>
	<div>
	<a href="#"><div id="edit" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;"></div></a>

		 	<a href="logout.php"><div id="logout" style="font-family: arial; color: white; text-align: center; justify-content: center; line-height: 45px; font-size: 16px;">Logout <img src="Images/logout.png" id="logoutpng"></div></a>
	<div id="menu">
		<img src="Images/menu.png" id="menus">
	</div>

	<div class="area">
		<h1 class="htitle">Patient | Information</h1>
		<?php if (isset($_SESSION['msgsadmin'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsadmin']; 
			unset($_SESSION['msgsadmin']);
		?>
	</div>
	<?php endif?>
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
			<form method="post" action="patient_list.php">
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
						<th class="th" >Action</th>
					
					
					
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
						<td class="td"><a href="remove_patient.php" style="text-decoration: none;">Delete</a></td>
					</tr>
				<?php } ?>
				</table>
	</div>
	<div id="menulist">
		<ul>
			<li><a href="home.php">Admin Profile</a></li>
			<li><a href="manage_users.php">Manage Users</a></li>
			
		
		</ul>
	</div>


</body>
</html>