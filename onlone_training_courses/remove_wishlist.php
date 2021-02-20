<?php
include("admin_panel/database_connection.php");
$did = $_GET['tid'];
$sql = "DELETE FROM course_wishlist WHERE wish_id=$did";

$result= mysqli_query($con, $sql);
if($result)
{
    header('location:mycourse.php');
}
else{
    echo 'unsuccess';
}

?>
<html>

<head>

</head>

<body>
    <p>Information Deleted Successfully</p>
</body>

</html>