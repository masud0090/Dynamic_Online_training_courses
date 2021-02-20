<?php
// Database connection
include("database_connection.php");
$id = $_GET['tid'];
$r_sql = "select * FROM registration WHERE id=$id";
$r_res = mysqli_query($con, $r_sql);
$r_row = mysqli_fetch_assoc($r_res);


//$result = mysql_query($query);

session_start();

//check if session exists?
// if (isset($_SESSION['admin_user_name'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
  <style>
  table, th, td{
      border:1px solid black;
      border-collapse:collapse;
  }
  </style>
    <?php
    include 'head.php';
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <div style="padding:10px; text-align:center;">

            <table class="table table-bordered" style="width:50%; margin-left:auto; margin-right:auto" >
              <tr>
                <th colspan="8">
                  <h2 style="text-align: center;">Student Information</h2>
                </th>
              </tr>

              <tr>
              <th> ID </th>
              <td><?php echo $r_row['id']; ?> </td>
              </tr>
              <tr>
              <th> First Name </th>
              <td> <?php echo $r_row['fname']; ?> </td>
              </tr>
              <tr>
              <th> Last Name </th>
              <td><?php echo $r_row['lname']; ?> </td>
              </tr>
              <tr>
              <th> Email </th>
              <td><?php echo $r_row['email']; ?> </td>
              </tr>
              <tr>
              <th> Phone </th>
              <td><?php echo $r_row['phone']; ?> </td>
              </tr>
              <tr>
              <th> Interest </th>
              <td> <?php echo $r_row['interest']; ?></td>
              </tr>
              <tr>
              <th> Gender </th>
              <td><?php echo $r_row['gender']; ?> </td>
              </tr>
              <tr>
              <th> Organization </th>
              <td> <?php echo $r_row['organization']; ?></td>
              </tr>
              <tr>
              <th> Designation </th>
              <td> <?php echo $r_row['designation']; ?></td>
              </tr>
              <tr>
              <th> User Name </th>
              <td><?php echo $r_row['username']; ?> </td>
              </tr>
              <tr>
              <th> Password </th>
              <td> <?php echo $r_row['password']; ?></td>
              </tr>

            


            </table>
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
// } else {
//   header("location: admin_login.php");
// }
?>