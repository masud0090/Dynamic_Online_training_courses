<>

    <?php
    // Database connection
    include("database_connection.php");

    $categories_name = $_POST['categories_name'];

    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $stmt = $con->prepare("insert into categories(categories_name) values(?)");
        $stmt->bind_param("s", $categories_name);
        if($execval = $stmt->execute()){
			echo $execval;
			$stmt->close();
            $con->close();
			//echo "Submitted successfully...";
			echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='add_categories_dispaly.php';</script>");

		}
		else{
			echo $execval;
			echo ("<script language='javascript'>
			window.alert(' Not successfully Submitted ...');
			 window.location.href='add_categories.php';</script>");
	
		}



        // $stmt->close();
        // $con->close();


    }
    ?>


