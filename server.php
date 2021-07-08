<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'db_pamanw');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $securityans = mysqli_real_escape_string($db, $_POST['securityans']);
  //$securityans = "ccc";
  $usertype = "users";
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `tbluserdetails` WHERE `email`='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $mail = mysqli_fetch_assoc($result);

    if ($mail['email'] === $email) {
      array_push($errors, "email already exists");
    }
  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO `tbluserdetails` (`name`, `email`, `password`,`usertype`,`securityans`) 
  			  VALUES('$name', '$email', '$password_1', '$usertype', '$securityans')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $mail;
//  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($email)) {
  	array_push($errors, "E-mail ID is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
	 
  	//$password = md5($password);
  	$query = "SELECT * FROM `tbluserdetails` WHERE `email`= '$email' AND `password` = '$password' AND `usertype` = 'users'";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) >= 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: user.php');
  	} else {
		$query = "SELECT * FROM `tbluserdetails` WHERE `email`= '$email' AND `password` = '$password' AND `usertype` = 'admin'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) >= 1) {
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in as admin";
  	  header('location: admin.php');
  	} else {
		array_push($errors, "Wrong username/password combination");
	}
	} 
  }
}
if (isset($_POST['forget_pass'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$securityans = mysqli_real_escape_string($db, $_POST['securityans']);
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($securityans)) { array_push($errors, "Security Answer is required"); }
	if (count($errors) == 0) {
		$query = "SELECT * FROM `tbluserdetails` WHERE `email`= '$email' AND `securityans` = '$securityans'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You can now reset password";
  	  header('location: reset.php');
		}else {
			array_push($errors, "Wrong Mail/Answer combination");
			}
		}
	
}

if (isset($_POST['reset_pass'])) {
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$email = $_SESSION['email'];
	 if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  
	if (count($errors) == 0) {
		$query = "UPDATE `tbluserdetails` SET `password` = '$password_1' WHERE `tbluserdetails`.`email` = '$email'";
		$results = mysqli_query($db, $query);
		echo mysqli_num_rows($results);
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "Password Updated";
  	  header('location: login.php');
		}
	
}

?>