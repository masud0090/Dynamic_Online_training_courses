<?php
// Database connection
include("database_connection.php");
include("../session.php");


$trainer_id = $_GET['tid'];
$sql = "select * FROM trainer WHERE trainer.trainer_id='$trainer_id '";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
if (isset($_SESSION['admin_user_name'])) {
  //}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php
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
            <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
              <div class="panel panel-primary">
                <div class="panel-heading text-center">
                  <h1>Add Trainer Information</h1>
                </div>
                <div class="panel-body">
                  <form action="update_trainer_connect.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">

                      <?php $img = $row['picture']; ?>

                      <img src="../images/<?php echo $img; ?>" width="50px" height="50px"> <br>

                      <input type="hidden" name="trainer_id" value="<?php echo $trainer_id; ?>">
                      <label for="picture">Edit picture</label>
                      <input type="file" class="form-control" id="picture" name="picture" value="<?php echo $row["picture"] ?>" />
                    </div>
                    <div class="form-group">
                      <label for="name">Edit Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"] ?>" required />
                    </div>

                    <div class="form-group">
                      <label for="specialist">Specialist</label>
                      <input type="text" class="form-control" id="specialist" name="specialist" value="<?php echo $row["specialist"] ?>" required />
                    </div>

                    <div class="form-group">
                      <label for="specialist">Edit trainer Info</label>
                      <script src="https://cdn.tiny.cloud/1/tiwwexx95p8jk38wqyantypmzurkd7prafgdo8pnqao58zve/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                      <textarea type="text" id="trainer_info" name="trainer_info" required> <?php echo $row["trainer_info"] ?></textarea>
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


                    <input type="submit" name="update" value="Update">
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