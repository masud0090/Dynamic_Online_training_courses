<?php
// Database connection
include("admin_panel/database_connection.php");
session_start();

if (isset($_POST['submit'])) {
    // username and password sent from form 


    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    // $names= $_POST['fname'];

    $sql = "SELECT id FROM registration WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, "SELECT * FROM registration WHERE username='$myusername'");
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];
    $data = mysqli_fetch_assoc($result2);
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        //  session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_user_name'] = $data['fname'];
        $_SESSION['login_user_id'] = $data['id'];

        //  header("location: mainindex.php");







        $course_id = $_POST['course_id'];
        $user_id = $_SESSION['login_user_id'];

        if ($con->connect_error) {
            echo "$con->connect_error";
            die("Connection Failed : " . $con->connect_error);
        } else {
            $sql = "insert into course_registration(course_id, registration_id) values( $course_id, $user_id)";
            if (mysqli_query($con, $sql)) {
                header('location:mycourse.php');
            } else {
                echo "not successfull " . $sql;
            }
        }
    } else {
        echo "Your Login Name or Password is invalid";
    }
}
