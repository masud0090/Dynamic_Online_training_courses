<?php
// Database connection
include("database_connection.php");
$did = $_GET['tid'];
$sql = "DELETE FROM course WHERE id='$did'";
mysqli_query($con, $sql);


if (mysqli_query($con, $sql)) {

echo ("<script language='javascript'>
window.alert('Delete Course successfully...');

window.location.href='add_course_display.php';</script>");


// echo "successfull";
} else {
echo ("<script language='javascript'>
window.alert(' Not successfully Submitted ...');
 window.location.href='add_course_display.php';</script>");
// echo "not successfull";
}
?>