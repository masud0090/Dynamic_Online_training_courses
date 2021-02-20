<?php
// Database connection
include("database_connection.php");
session_start();
// if (isset($_GET['id'])) {
$id = $_GET['tid'];
$sql = "select * FROM course WHERE course.id='$id'";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
if (isset($_SESSION['admin_user_name'])) {

  //}
?>
  <!DOCTYPE HTML>
  <html>

  <head> <?php
          include 'head.php';
          ?>

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
            <div>
              <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
                <div class="panel panel-primary">
                  <div class="panel-heading text-center">
                    <h1>Edit Course Information</h1>
                  </div>
                  <div class="panel-body">
                    <form action="update_course_connect.php" method="post" enctype="multipart/form-data">

                      <div class="form-group">

                        <label for="name">Edit Title</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row["title"] ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="name">Edit Date</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?php echo $row["date"] ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="specialist">Edit Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $row["duration"] ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="specialist">Edit Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $row["price"] ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="specialist">Edit Session</label>
                        <input type="text" class="form-control" id="session" name="session" value="<?php echo $row["session"] ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="specialist">Edit Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $row["deadline"] ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="specialist">Edit Description</label>
                        <script src="https://cdn.tiny.cloud/1/tiwwexx95p8jk38wqyantypmzurkd7prafgdo8pnqao58zve/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                        <textarea type="text" class="form-control" id="description" name="description" required>
                      <?php echo $row["description"] ?>
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


                      <input class="btn btn-primary" type="submit" name="update" value="Update">
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