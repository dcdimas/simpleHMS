<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root','', 'covidhsm');

	//initialize variables

	$Full_name = "";
	$Birthday = "";
  $Address = "";
	$Contact_no = "";
	$Email_Add = "";
	$Username = "";
	$Password1 = "";
  $Password2 ="";
	$errors = array();
  $username =$_SESSION['username'];
  $password = "";
  
	
	// $ID = 0;
	// $update = false;

	if (isset($_POST['save'])) {
		$Full_name =$_POST['fullname'];
		$Birthday = $_POST['bday'];
    $Address = $_POST['address'];
		$Contact_no = $_POST['contact'];
		$Email_Add = $_POST['email'];
		$Username = $_POST['username'];
		$Password1 = $_POST['pass1'];
		$Password2 = $_POST['pass2'];

	if (empty($Full_name)) { array_push($errors, "Full name"); }
  if (empty($Birthday)) { array_push($errors, "Birthday"); }
   if (empty($Address)) { array_push($errors, "Address"); }
  if (empty($Contact_no)) { array_push($errors, "Contact number"); }
  if (empty($Email_Add)) { array_push($errors, "Email address"); }
  if (empty($Username)) { array_push($errors, "Username"); }
  if (empty($Password1)) { array_push($errors, "Password"); }
  if ($Password1 != $Password2) {array_push($errors, "The two passwords do not match");}


  $user_check_query = "SELECT * FROM recep_register WHERE rUsername='$Username' OR rEmail_Add='$Email_Add' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

   if ($user) { // if user exists
    if ($user['rUsername'] === $Username) {
      array_push($errors, "Username already exists");
    }

    if ($user['rEmail_Add'] === $Email_Add) {
      array_push($errors, "Email already exists");
    }
  }
  
 if (count($errors) == 0) {
  

  	mysqli_query ($db, "INSERT INTO recep_register (rFull_name, rBirthday, rAddress, rContact_no, rEmail_Add, rUsername, rPassword) VALUES ('$Full_name', '$Birthday', '$Address', '$Contact_no', '$Email_Add','$Username', '$Password1')");
  	header('location: home.php');

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
 
     $query = "SELECT * FROM  recep_register WHERE rUsername='$username' AND rPassword='$password' LIMIT 1";
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

