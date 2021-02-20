<html>

<body>

	<?php
	$title = $_POST['title'];
	$date = $_POST['date'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$session = $_POST['session'];
	$deadline = $_POST['deadline'];
	$description = $_POST['description'];
	$trainer_id = $_POST['trainer_id'];
	$categories_id = $_POST['categories_id'];




	// Database connection
	include("database_connection.php");
	if ($con->connect_error) {
		echo "$con->connect_error";
		die("Connection Failed : " . $con->connect_error);
	} else {
		$stmt = $con->prepare("insert into course(title, date, duration, price, session, deadline,description,trainer_id,categories_id) values(?, ?, ?, ?, ?, ?,?,?,?)");
		$stmt->bind_param("sssssssii", $title, $date, $duration, $price, $session, $deadline, $description, $trainer_id, $categories_id);
		if($execval = $stmt->execute()){
			echo $execval;
			$stmt->close();
            $con->close();
			//echo "Submitted successfully...";
			echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='add_course_display.php';</script>");

		}
		else{
			echo $execval;
			echo ("<script language='javascript'>
			window.alert(' Not successfully Submitted ...');
			 window.location.href='add_course.php';</script>");
	
		}
		
		
		
		
		// header("location:");

	}
	
	?>
	
	
	  
	

	
			


   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
