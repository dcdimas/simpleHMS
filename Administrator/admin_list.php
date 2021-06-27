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
	<title>Admin | Add/Delete</title>
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
		<h1 class="htitle">Admin | Add/Delete</h1>
		
	<div id="search">
			<?php if(isset($_POST['go'])){
			$search = $_POST['search'];
			$sql = "SELECT DISTINCT ID, aUsername, aPassword FROM admin_login  WHERE ID LIKE '%$search%'";
		}else{
			$sql = "SELECT DISTINCT ID, aUsername, aPassword FROM admin_login ";
			$search ="";
		}
			$results = mysqli_query($db, $sql );
		 ?>
			<form method="post" action="admin_list.php">
			<input type="text" name="search" placeholder="Search by name" value="<?php echo $search;?>" >
			<button name="go">go</button>

		</form>
		</div>
	<?php if (isset($_SESSION['msgsadmin'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsadmin']; 
			unset($_SESSION['msgsadmin']);
		?>
	</div>
	<?php endif?>

		<?php if (isset($_SESSION['msgsadminadd'])): ?>
	<div style="color: green; font-family: helvetica; font-size: 15px; font-weight: bold; margin: 40px auto; border: 1px solid green; display: block; text-align: center; padding: 15px; width: 30%;">
		<?php 
			echo $_SESSION['msgsadminadd']; 
			unset($_SESSION['msgsadminadd']);
		?>
	</div>
	<?php endif?>
			<table class="tbl" width="80%">
				<thead>
					<tr>
						<th class="th">ID</th>
						<th class="th">Username</th>
						<th class="th">Password</th>
						
					
					
					</tr>
				</thead>
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr class="tr">
						<!--  -->
						<td class="td"><?php echo $row['ID']; ?></td>
						<td class="td"><?php echo $row['aUsername']; ?></td>
						<td class="td"><?php echo $row['aPassword']; ?></td>
					</tr>
				<?php } ?>
				<a href="add_admin.php"><input type="submit" name="Add" class="btn" value="Add" style="margin-left: 120px;"></a>
				<a href="remove_admin.php"><input type="submit" name="Delete" class="btn" value="Delete" style="margin-left: 120px; background: red;"></a>
			
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