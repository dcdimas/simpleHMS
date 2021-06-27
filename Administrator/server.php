<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root','', 'covidhsm');

  $username = "";
  $password = "";
	$errors = array();


if (isset($_POST['Login_admin'])) {
  $username =$_POST['username'];
  $password =$_POST['pass'];

  if (empty($username)) {
    array_push($errors, "Username");
  }
  if (empty($password)) {
    array_push($errors, "Password");
  }

  if (count($errors) == 0) {
     $query = "SELECT * FROM  admin_login WHERE aUsername ='$username' AND aPassword ='$password' LIMIT 1";
     $results = mysqli_query($db, $query);
     // $password = md5($password);
   // mysqli_query ($db, "SELECT * FROM patient_register WHERE pUsername='$username' AND pPassword='$password'");
   if (mysqli_num_rows($results) == 1) {
   	  $_SESSION ['username']  = $username;
      header('location: home.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }

}
	

?>

