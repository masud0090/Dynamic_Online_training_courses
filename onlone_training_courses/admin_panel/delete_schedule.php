<?php
// Database connection
include("database_connection.php");
$did = $_GET['tid'];
$sql = "DELETE FROM course_schedule WHERE course_id='$did'";
mysqli_query($con, $sql);
?>
<html>

<head>

</head>

<body>

<?php
if (mysqli_query($con, $sql)) {

    echo ("<script language='javascript'>
    window.alert('Deleted  successfully...');

    window.location.href='schedule_display.php';</script>");

}
    // // echo "successfull";
    // } else {
    // echo ("<script language='javascript'>
    // window.alert(' Not Deleted successfully...');
    // window.location.href='add_categories_dispaly.php';</script>");
    // // echo "not successfull";
    // }


?>



    <!-- <p>Information Deleted Successfully</p> -->
</body>

</html>