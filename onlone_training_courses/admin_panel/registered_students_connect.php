<?php
// Database connection
include("database_connection.php");

if (isset($_POST['approve'])) {
    $cr_id = $_POST['cr_id'];
    $c_id = $_POST['c_id'];
    $today = date('Y-m-d');
    $sql = "UPDATE course_registration SET status = 1, approved_date='$today' WHERE course_registration.id=$cr_id";
    $results = mysqli_query($con, $sql);


    echo ("<script language='javascript'>
    window.alert('Approved successfully...');
    
    window.location.href='registered_students.php?tid=$c_id';</script>");
}
