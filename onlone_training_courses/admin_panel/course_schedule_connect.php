<html>

<body>

    <?php





    // Database connection
    include("database_connection.php");
    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $course_id = $_POST['course_id'];
        $schedule_id = $_POST['schedule_id'];

        $count = count($schedule_id);
        for ($i = 0; $i < $count; $i++) {
            $schedule_list = $schedule_id[$i];
            $sql = ("insert into course_schedule(course_id, schedule_id) values('$course_id', '$schedule_list')");
            if (mysqli_query($con, $sql)) {
                echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='schedule_display.php';</script>");


                // echo "successfull";
            }
            //  else {
            // // 	echo ("<script language='javascript'>
            // // 	window.alert(' Not successfully Submitted ...');
            // // 	 window.location.href='add_trainer.php';</script>");
            // //     // echo "not successfull";
            // // }




            // $stmt = $con->prepare("insert into course_schedule(course_id, schedule_id) values(?, ?)");

            //     $stmt->bind_param("ii", $course_id, $schedule_list[$i]);
            //     $execval = $stmt->execute();
            //     echo $execval;
            //     echo "Submitted successfully...";
            //     $stmt->close();
            //     $con->close();    
        }
    }
    ?>


</html>
</body>