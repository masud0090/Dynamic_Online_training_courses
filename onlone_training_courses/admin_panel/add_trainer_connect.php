<?php

// Database connection
include("database_connection.php");

 
if (isset($_POST['submit'])) {
    // $id=$_POST['id'];
    $picture = $_FILES['picture']['name'];
    $temp = $_FILES['picture']['tmp_name'];
    move_uploaded_file($temp, "../images/$picture");
    $name = $_POST['name'];
    $specialist = $_POST['specialist'];
    $trainer_info = $_POST['trainer_info'];

    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $sql = "insert into trainer(picture,name, specialist, trainer_info) values( '$picture', '$name', '$specialist', '$trainer_info')";
        if (mysqli_query($con, $sql)) {
            echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='add_trainer_display.php';</script>");


            // echo "successfull";
        } else {
			echo ("<script language='javascript'>
			window.alert(' Not successfully Submitted ...');
			 window.location.href='add_trainer.php';</script>");
            // echo "not successfull";
        }
    }
}
