<?php
include('session.php');
// Database connection
include("admin_panel/database_connection.php");
$username = "";
$email = "";
if (isset($_POST['submit'])) {
  $fname  = $_POST['fname'];
  $lname  = $_POST['lname'];
  $email = $_POST['email'];
  $phone  = $_POST['phone'];
  $interest  = $_POST['interest'];
  $gender = $_POST['gender'];
  $organization = $_POST['organization'];
  $designation = $_POST['designation'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql_u = "SELECT * FROM registration WHERE username='$username'";
  $sql_e = "SELECT * FROM registration WHERE email='$email'";
  $res_u = mysqli_query($con, $sql_u);
  $res_e = mysqli_query($con, $sql_e);

  if (mysqli_num_rows($res_u) > 0) {
    $name_error = "Sorry... username already taken";
    header('Location: signup.php?error=' . $name_error);
  } else if (mysqli_num_rows($res_e) > 0) {
    $email_error = "Sorry... email already taken";
    header('Location: signup.php?error1=' . $email_error);
  } else {
    $query = "INSERT INTO registration (fname, lname, email, phone, interest, gender, organization, designation, username, password) 
      	    	  VALUES ('$fname','$lname', '$email', '$phone', '$interest', '$gender', '$organization', '$designation', '$username', '$password')";
    // $results = mysqli_query($con, $query);
    
    if (mysqli_query($con, $query)) {
      $user_id = mysqli_insert_id($con);
      $_SESSION['login_user'] = $username;
      $_SESSION['login_user_id'] = $user_id;
      $_SESSION['login_user_name'] = $fname;

      header("location:mainindex.php");
    }
    // 
    exit();
    
  }
}
