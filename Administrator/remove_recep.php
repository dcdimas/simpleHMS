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
	<title>Receptionist | Delete</title>
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
		<h1 class="htitle">Receptionist | Delete</h1>
	<form action="remove_recep.php" method="post" class="form">
		<div class="edit">
			<label for="pID">Receptionist ID:</label>
			<input type="text" name="pID" required/>
		</div>
		<input type="submit" name="remover" value="Delete" class="btn" style="background: red;">
		
	</form>
	</div>

		<?php
			if (isset($_POST['remover'])) {
				$id = $_POST['pID'];
				

				mysqli_query($db, "DELETE FROM recep_register WHERE ID = '$id'" );
				 $_SESSION['msgsadmin'] =  "Removed succesfully!";
				header('location: receptionist_list.php');
			}
		?>


	<div id="menulist">
		<ul>
			<li><a href="home.php">Admin Profile</a></li>
			<li><a href="manage_users.php">Manage Users</a></li>
			
		
		</ul>
	</div>


</body>
</html>