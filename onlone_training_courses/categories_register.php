<?php
// Database connection
include("admin_panel/database_connection.php");

if (isset($_POST['register'])) {
    
   
    $course_id = $_POST['course_id'];
    $user_id = $_POST['user_id'];

    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $sql = "insert into course_registration(course_id, registration_id) values( $course_id, $user_id)";
        if (mysqli_query($con, $sql)) {
            header("location:mycourse.php");
        } else {
            echo "not successfull ";
        }
    }
}
// if (isset($_POST['registered'])) {
    
   
//     $course_id = $_POST['course_id'];
//     $user_id = $_POST['user_id'];

//     if ($con->connect_error) {
//         echo "$con->connect_error";
//         die("Connection Failed : " . $con->connect_error);
//     } else {
//         $sql = "insert into course_registration(course_id, registration_id) values( $course_id, $user_id)";
//         if (mysqli_query($con, $sql)) {
//             echo "successfull";
//         } else {
//             echo "not successfull ".$sql;
//         }
//     }
// }
