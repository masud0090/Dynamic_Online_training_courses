
    <?php
    // Database connection
	include("database_connection.php");

    if (isset($_POST['update'])) {
        $uid = $_POST['trainer_id'];
        //$pic = $_POST['picture'];
        $picture = $_FILES['picture']['name'];
        $temp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($temp, "../images/$picture");
        $names = $_POST['name'];
        $specialists = $_POST['specialist'];
        $trainer_infos = $_POST['trainer_info'];

        $sqlupdate = "Update trainer SET  picture='$picture', name='$names', specialist='$specialists', trainer_info= '$trainer_infos' WHERE trainer_id='$uid'";
        $res = mysqli_query($con, $sqlupdate);
        if ($res) {

                echo ("<script language='javascript'>
                    window.alert('Updated  successfully...');
        
                    window.location.href='add_trainer_display.php';</script>");
                // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
            }

            // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';

            // $filedel = '../images/' . $_FILES['picture'];
            // $del =  unlink($filedel);

            // if ($del) {
            //     echo 'file deleted';
            // } else {
            //     echo 'not deleted <br>';
            //     print_r($filedel);
            // }
        }
    


    ?>
