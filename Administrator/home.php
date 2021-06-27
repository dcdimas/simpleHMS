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
	<title>Admin | Profile</title>
	<link rel="stylesheet" type="text/css" href="a.css">
</head>
<body>

		<div class="navbar">
		<h1 id="name">COVID-19 Hospital Management System 
			<img src="images/hospital.png" id="hospital"> 
		</h1>
	</div>
		</h1>
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
		<h1 class="htitle">Admin | Profile</h1>
		<?php if (isset($_SESSION['msgsnurse'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsnurse']; 
			unset($_SESSION['msgsnurse']);
		?>
	</div>
	<?php endif?>
		<?php $results = mysqli_query($db, "SELECT * FROM admin_login where aUsername = '$username'"); ?>
			<table width="60%" class="tbl">
				
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<th class="th">ID</th>
						<td class="td"><?php echo $row['ID']; ?></td>
					</tr>
					<tr>
						<th class="th">Username</th>
					<td class="td"><?php echo $row['aUsername']; ?></td>
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