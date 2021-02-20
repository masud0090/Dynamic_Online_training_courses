<?php
// Database connection
include("database_connection.php");
session_start();

  //check if session exists?
  if (isset($_SESSION['admin_user_name'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php
    include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
  
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <?php
    include 'top_menu.php';
    ?>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
          <?php
          include 'sidenav.php';
          ?>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container">
          <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                    <h1>Add Schedule for Course</h1>
                </div>
                <div class="panel-body">
                    <form action="course_schedule_connect.php" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2"> Enter Course </label>
                            <select class="form-control" id="exampleFormControlSelect2" name="course_id">
                                <?php
                                $query = "select * from course  ";
                                $res = mysqli_query($con, $query);
                                ?>
                                <?php while ($rows2 = mysqli_fetch_array($res)) {
                                ?>
                                    <option value="<?php echo $rows2['id']; ?>"> <?php echo $rows2['title']; ?></option>


                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Enter Schedule </label>

                            <select id="multiple-checkboxes"multiple="multiple" name="schedule_id[]">
                            
                                <?php
                                $query = "select * from schedule  ";
                                $res = mysqli_query($con, $query);
                                ?>
                                
                               
                                <?php while ($rows3 = mysqli_fetch_array($res)) {
                                ?>

                            
                                <option value="<?php echo $rows3['id']; ?>"> <?php echo $rows3['day']; ?></option>

  

                                <?php
                                }
                                ?>
                                </select>
                        </div>




                       
                        <!-- <button type="submit" class="btn-save btn btn-primary btn-sm" >Submit</button> -->
                        <input type="submit" class="btn-save btn btn-primary btn-sm" />
                        


                    </form>



                </div>



            </div>
        </div>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
              <?php
              include 'footer.php';
              ?>
          </div>
        </footer>
      </div>
    </div>

    
    
    


    <!-- <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
    <!-- <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script> --> -->
    <!-- <script src="assets/demo/datatables-demo.js"></script> -->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">




   
    
    <script> $(document).ready(function() {
    $('#multiple-checkboxes').multiselect({
              includeSelectAllOption: true,
          });
      });</script>

  </body>

</html>
<?php
}
  else{
    header("location: admin_login.php");

  }
  ?>



