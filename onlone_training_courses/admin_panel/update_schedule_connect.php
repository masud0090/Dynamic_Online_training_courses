<?php
// Database connection
include("database_connection.php");

if (isset($_POST['submit'])) {

    $did = $_POST['course_id'];
    $schedule_id = $_POST['schedule_id'];

$sql = "DELETE FROM course_schedule WHERE course_id='$did'";
$result4=mysqli_query($con, $sql);

if ($result4) {
   
    $did2 = $_POST['course_id'];
    $schedule_id2 = $_POST['schedule_id'];

                //  $course_id = $_POST['course_id'];
               
         
                $count=count($schedule_id2);
                for($i=0;$i<$count;$i++)
                {
                    $schedule_list=$schedule_id2[$i];
                   $sql2 = ("insert into course_schedule(course_id, schedule_id) values('$did2', '$schedule_list')");
                   if (mysqli_query($con, $sql2)) {
                    echo ("<script language='javascript'>
                    window.alert('Updated successfully...');
                    
                    window.location.href='schedule_display.php';</script>");
        
        
                    // echo "successfull";
                 }


     }

 
             }
             else{
                 echo 'error';
             }
 
            }

     ?>


           
