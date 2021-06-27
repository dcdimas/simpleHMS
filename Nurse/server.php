<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root','', 'covidhsm');

	//initialize variables

	$Full_name = "";
	$Birthday = "";
  $Schedule = "";
  $Address = "";
	$Contact_no = "";
	$Email_Add = "";
	$Username = "";
	$Password1 = "";
  $Password2 ="";
	$errors = array();
	
	// $ID = 0;
	// $update = false;

	if (isset($_POST['save'])) {
		$Full_name =$_POST['fullname'];
		$Birthday = $_POST['bday'];
    $Schedule = $_POST['sched'];
    $Address = $_POST['address'];
		$Contact_no = $_POST['contact'];
		$Email_Add = $_POST['email'];
		$Username = $_POST['username'];
		$Password1 = $_POST['pass1'];
		$Password2 = $_POST['pass2'];

	if (empty($Full_name)) { array_push($errors, "Full name"); }
  if (empty($Birthday)) { array_push($errors, "Birthday"); }
  if (empty($Address)) { array_push($errors, "Address"); }
  if (empty($Schedule)) { array_push($errors, "Schedule"); }
  if (empty($Contact_no)) { array_push($errors, "Contact number"); }
  if (empty($Email_Add)) { array_push($errors, "Email address"); }
  if (empty($Username)) { array_push($errors, "Username"); }
  if (empty($Password1)) { array_push($errors, "Password"); }
  if ($Password1 != $Password2) {array_push($errors, "The two passwords do not match");}


  $user_check_query = "SELECT * FROM nurse_register WHERE nUsername='$Username' OR nEmail_Add='$Email_Add' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

   if ($user) { // if user exists
    if ($user['nUsername'] === $Username) {
      array_push($errors, "Username already exists");
    }

    if ($user['nEmail_Add'] === $Email_Add) {
      array_push($errors, "Email already exists");
    }
  }
  
 if (count($errors) == 0) {
  	

  	mysqli_query ($db, "INSERT INTO nurse_register (nFull_name, nBirthday, nSchedule, nAddress, nContact_no, nEmail_add, nUsername, nPassword) VALUES ('$Full_name', '$Birthday', '$Schedule', '$Address', '$Contact_no', '$Email_Add','$Username', '$Password1')");
  	$_SESSION['mess'] = "Registered successfully! Log in first.";
    header('location: nurse_login.php');

		}
			
		}



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
  
     $query = "SELECT * FROM  nurse_register WHERE nUsername='$username' AND nPassword='$password' LIMIT 1";
     $results = mysqli_query($db, $query);
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

