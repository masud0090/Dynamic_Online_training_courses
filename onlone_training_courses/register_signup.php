<?php
// Database connection
include("admin_panel/database_connection.php");
session_start();
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
  $myusername = $_POST['username'];
  $password = $_POST['password'];
  $course_id = $_POST['course_id'];
  //  $user_id =$_POST['user_id'];




  $sql_u = "SELECT * FROM registration WHERE username='$myusername'";
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
                VALUES ('$fname','$lname', '$email', '$phone', '$interest', '$gender', '$organization', '$designation', '$myusername', '$password')";



    if (mysqli_query($con, $query)) {
      $user_id = mysqli_insert_id($con);
      $_SESSION['login_user'] = $myusername;
      $_SESSION['login_user_id'] = $user_id;
      $_SESSION['login_user_name'] = $fname;
      $query2 = mysqli_query($con, "INSERT INTO course_registration (course_id, registration_id) 
      VALUES ($course_id, $user_id)");
      header('location:mycourse.php');
    }
    // echo ("<script language='javascript'>
    // window.alert('Information Successfully save');
    // window.location.href='intop.php';</script>");
    // $sql = "SELECT id FROM registration WHERE username = '$myusername' and password = '$mypassword'";
    // $result = mysqli_query($con, $sql);

    //$result2 = mysqli_query($con, "SELECT * FROM registration WHERE username='$myusername'");
    // $data = mysqli_fetch_assoc($result2);
    // $count = mysqli_num_rows($result);
    // $_SESSION['login_user'] = $myusername;

    /* if ($query2) {
        echo 'success';
      } else {
        echo 'not success';
      } */
    /*   } else {
      echo 'Information not Saved';
    } */


    //echo 'Saved!<br>';

    exit();
  }
}
