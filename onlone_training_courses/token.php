<?php
include('forget_password.php');
$errors = [];
$user_id = "";;





if (isset($_POST['token-check'])) {
  $token =  $_POST['token'];
  $getEmail = $_REQUEST['email'];
  $query1 = "SELECT token FROM password_resets WHERE token='$token'";
  $results = mysqli_query($con, $query1);
  $count1 = mysqli_num_rows($results);

  // if (empty($token)) {
  //   array_push($errors, "Your token is required");
  // } else if (mysqli_num_rows($results) <= 0) {
  //   array_push($errors, "Sorry, no token exists on our system with that email");
  // }

  if ($count1 == 1) {

    header('location: new_pass.php');
  } else {
    echo ("<script language='javascript'>
			window.alert(' Not successfully Submitted ...');
			 window.location.href='pending.php?email=$getEmail';</script>");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>