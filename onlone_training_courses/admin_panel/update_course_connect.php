
    <?php
   // Database connection
	include("database_connection.php");

    if (isset($_POST['update'])) {
        $uid = $_POST['id'];

        $title = $_POST['title'];
        $date = $_POST['date'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];
        $session = $_POST['session'];
        $deadline = $_POST['deadline'];
        $description = $_POST['description'];

        $sqlupdate = "Update course SET  title='$title', date='$date', duration='$duration', price= '$price', session= '$session', deadline= '$deadline', description= '$description' WHERE id='$uid'";
        $res = mysqli_query($con, $sqlupdate);
        if ($res) {

            echo ("<script language='javascript'>
			window.alert('updated Successfully...');
			
			window.location.href='add_course_display.php';</script>");


            // echo "successfull";
        } else {
			echo ("<script language='javascript'>
			window.alert(' Not successfully Updated...');
			 window.location.href='add_course_display.php';</script>");
            // echo "not successfull";
        }
    }


    ?>
