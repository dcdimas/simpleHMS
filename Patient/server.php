<?php 
  session_start();
  $db = mysqli_connect('localhost', 'root','', 'covidhsm');

  //initialize variables

  $Full_name = "";
  $Birthday = "";
  $Age = "";
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
    $Age = $_POST['age'];
    $Sex =  $_POST['sex'];
    $Address = $_POST['address'];
    $Contact_no = $_POST['contact'];
    $Email_Add = $_POST['email'];
    $Username = $_POST['username'];
    $Password1 = $_POST['pass1'];
    $Password2 = $_POST['pass2'];

  if (empty($Full_name)) { array_push($errors, "Full name"); }
  if (empty($Birthday)) { array_push($errors, "Birthday"); }
  if (empty($Address)) { array_push($errors, "Address"); }
  if (empty($Age)) { array_push($errors, "Age"); }
   if (empty($Sex)) { array_push($errors, "Gender"); }
  if (empty($Contact_no)) { array_push($errors, "Contact number"); }
  if (empty($Username)) { array_push($errors, "Username"); }
  if (empty($Password1)) { array_push($errors, "Password"); }
  if ($Password1 != $Password2) {array_push($errors, "The two passwords do not match");}


  $user_check_query = "SELECT * FROM patient_register WHERE pUsername='$Username'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

   if ($user) { // if user exists
    if ($user['pUsername'] === $Username) {
      array_push($errors, "Username already exists. Try another one.");
    }

  }
  
 if (count($errors) == 0) {

    mysqli_query ($db, "INSERT INTO patient_register (pFull_name, pBirthday, pAge, pSex, pAddress, pContact_no, pEmail_add, pUsername, pPassword) VALUES ('$Full_name', '$Birthday', $Age, '$Sex', '$Address', '$Contact_no', '$Email_Add','$Username', '$Password1')");
    $_SESSION['mess'] = "Registered successfully! Log in first.";
    $_SESSION['fullname'] = $Full_name;
    header('location: patient_login.php');

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
  
     $query = "SELECT * FROM  patient_register WHERE pUsername='$username' AND pPassword='$password' LIMIT 1";
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

