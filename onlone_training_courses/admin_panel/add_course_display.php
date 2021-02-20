<?php
// Database connection
include("database_connection.php");
$query = "select * from course";
$res = mysqli_query($con, $query);
//$result = mysql_query($query);

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
          <div style="margin:70px;">

            <table class="table table-bordered ">
              <tr>
                <th colspan="10">
                  <h2 style="text-align: center;">Course Data</h2>
                </th>
              </tr>
              <th> SERIAL </th>
              <th> TITLE </th>
              <th> DATE </th>
              <th> DURATION</th>
              <th> PRICE </th>
              <th> SESSUON </th>
              <th> DEADLINE </th>
              <th>REGISTERED</th>
              <th>ENROLLED</th>

              <th>ACTION</th>



              </tr>



              <?php
              $serial = 1;
              while ($rows = mysqli_fetch_array($res)) {
              ?>
                <tr>
                  <td><?php echo $serial++; ?></td>
                  <td><?php echo $rows['title']; ?></td>
                  <td><?php echo $rows['date']; ?></td>
                  <td><?php echo $rows['duration']; ?></td>
                  <td><?php echo $rows['price']; ?></td>
                  <td><?php echo $rows['session']; ?></td>
                  <td><?php echo $rows['deadline']; ?></td>

                  <td><br>
                    <h4 class="count" style="text-align: center; font-size:25px" ;>
                      <a class="" href="registered_students.php?tid=<?php echo $rows['id']; ?>" role="button"><i class="fas fa-eye"></i></a>
                    </h4>
                  </td>
                  <?php
                  $cr_id = $rows['id'];
                  $query2 = "select cr.course_id ,cr.approved_date ,COUNT(cr.approved_date) count_name FROM course_registration cr where cr.course_id=$cr_id";
                  $res2 = mysqli_query($con, $query2);
                  $rows2 = mysqli_fetch_assoc($res2);
                  ?>
                  <td>
                    <h4 class="count" style="text-align: center; font-size:25px" ;>
                      <a href="approved_registred_student.php?tid=<?php echo $rows['id']; ?> "><?php echo "(" . $rows2['count_name'] . ")"; ?> <br>
                      </a>
                    </h4>


                  </td>
                  <td class="text-center"><a class="btn btn-dark btn-sm" href="update_course.php?tid=<?php echo $rows['id']; ?>"> Edit</a><br> <br>

                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmation(<?php echo $rows['id']; ?>)"> Delete</a>
                  </td>

                </tr>
              <?php
              }
              ?>

              <script>
                function confirmation(delid) {
                  if (confirm("Do you want to delete?")) {
                    window.location.href = 'delete_course.php?tid=' + delid + '';
                    return true;
                  }

                }
              </script>

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
} else {
  header("location: admin_login.php");
}
?>