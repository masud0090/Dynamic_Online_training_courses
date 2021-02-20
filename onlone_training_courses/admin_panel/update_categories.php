<?php
// Database connection
include("database_connection.php");
// if (isset($_GET['id'])) {
$id = $_GET['tid'];
$sql = "select * FROM categories WHERE categories.categories_id='$id'";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
session_start();

  //check if session exists?
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
        <div style="margin-left:70px; margin-top:40px; border:1px solid black;">
            <div class="panel panel-primary" style="margin:100px;">
                <div class="panel-heading text-center">
                    <h1>Add Categories Information</h1>
                </div>
                <div class="panel-body">
                    <form action="update_categories_connect.php" method="post" enctype="multipart/form-data">



                        <div class="form-group">
                            <label for="specialist">Edit categories</label>
                            <input type="hidden" name="categories_id" value="<?php echo $id; ?>" required>
                            <input type="text" class="form-control" id="categories_name" name="categories_name" value="<?php echo $row["categories_name"] ?>" required />
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
    <script
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
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
</html>
<?php
}
  else{
    header("location: admin_login.php");

  }
  ?>




