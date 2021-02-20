<?php



// Database connection
include("database_connection.php");
session_start();

//check if session exists?
if (isset($_SESSION['admin_user_name'])) {

?>



  <!DOCTYPE html>
  <html>

  <head>
    <?php
    include 'head.php';
    ?>

    <!-- <link rel="stylesheet" type="text/css" href="css/bootstraps.css" /> -->
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
          <div>

            <div class="container ">
              <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
                <div class="panel panel-primary">
                  <div class="panel-heading text-center">
                    <h1>Add New Course</h1>
                  </div>
                  <div class="panel-body">
                    <form action="add_course_connect.php" method="post">
                      <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control" id="title" name="title" required />
                      </div>
                      <div class="form-group">
                        <label for="date">Date *</label>
                        <input type="text" class="form-control" id="date" name="date" required />
                      </div>

                      <div class="form-group">
                        <label for="duration">Duration *</label>
                        <input type="text" class="form-control" id="duration" name="duration" required />
                      </div>
                      <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="text" class="form-control" id="price" name="price" required />
                      </div>
                      <div class="form-group">
                        <label for="session">Session *</label>
                        <input type="text" class="form-control" id="session" name="session" required />
                      </div>
                      <div class="form-group">
                        <label for="deadline">Deadline *</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" required />
                      </div>

                      <div class="form-group">
                        <label for="trainer_info">Description *</label>
                        <script src="https://cdn.tiny.cloud/1/tiwwexx95p8jk38wqyantypmzurkd7prafgdo8pnqao58zve/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                        <textarea type="text" class="form-control" id="description" name="description" required>
                                </textarea>
                        <script>
                          tinymce.init({
                            selector: 'textarea',
                            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                            toolbar_mode: 'floating',
                            tinycomments_mode: 'embedded',
                            tinycomments_author: 'Author name',
                          });
                        </script>
                      </div>


                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Select Trainer * </label>
                        <select class="form-control" id="exampleFormControlSelect2" name="trainer_id" required>
                          <?php
                          $query = "select * from trainer  ";
                          $res = mysqli_query($con, $query);
                          ?>
                          <?php while ($rows = mysqli_fetch_array($res)) {
                          ?>
                            <option value="<?php echo $rows['trainer_id']; ?>"> <?php echo $rows['name']; ?></option>


                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Select Categories *</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="categories_id" required>
                          <?php
                          $query = "select * from categories  ";
                          $res = mysqli_query($con, $query);
                          ?>
                          <?php while ($rows = mysqli_fetch_array($res)) {
                          ?>
                            <option value="<?php echo $rows['categories_id']; ?>"> <?php echo $rows['categories_name']; ?></option>


                          <?php
                          }
                          ?>
                        </select>
                      </div>




                      <!-- <a class="btn btn-primary" href="#" role="button">submit</a> -->
                      <input type="submit" class="btn btn-primary" />
                    </form>


                  </div>

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

    <!-- <script>
		function submit() {
		alert("");
		$stmt->close();
		$con->close();
		}
		
		</script> -->











    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>

  </html>
<?php
} else {
  header("location: admin_login.php");
}
?>