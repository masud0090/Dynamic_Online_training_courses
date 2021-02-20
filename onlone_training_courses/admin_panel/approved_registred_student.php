<?php
// Database connection
include("database_connection.php");
$id = $_GET['tid'];
$ar_sql = "select * FROM course_registration WHERE course_id=$id";
$ar_res = mysqli_query($con, $ar_sql);
// $r_row = mysqli_fetch_assoc($r_res);


//$result = mysql_query($query);

session_start();

//check if session exists?
// if (isset($_SESSION['admin_user_name'])) {
?>
<!DOCTYPE html>
<html>

<head>
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
                <div style="margin:70px;">

                    <table class="table table-bordered ">
                        <tr>
                            <th colspan="8">
                                <h2 style="text-align: center;">Approved Student List</h2>
                            </th>
                        </tr>
                        <th> SERIAL </th>
                        <th> ID </th>
                        <th> NAME </th>
                        <th> PHONE NUMBER </th>
                        <th> EMAIL</th>





                        </tr>

                        <?php
                        $serial = 1;
                        while ($ar_row = mysqli_fetch_array($ar_res)) {
                            $ar_id1 = $ar_row['registration_id'];
                            $ar_sql1 = "select distinct cr.id cr_id, cr.course_id, r.id,r.phone,r.email,r.username,concat(r.fname,' ',r.lname) AS FullName,cr.status from registration r, course_registration cr WHERE cr.registration_id=$ar_id1 and r.id=$ar_id1 and cr.course_id=$id and status=1 ORDER by approved_date";

                            $ar_res1 = mysqli_query($con, $ar_sql1);

                            while ($rows1 = mysqli_fetch_array($ar_res1)) {
                        ?>
                                <tr>
                                    <td><?php echo $serial++; ?></td>
                                    <td><?php echo $rows1['cr_id']; ?></td>
                                    <td><?php echo $rows1['FullName']; ?></td>
                                    <td><?php echo $rows1['phone']; ?></td>
                                    <td><?php echo $rows1['email']; ?></td>




                                    <td class="text-center">
                                        <a class="btn btn-dark" href="students_info.php?tid=<?php echo $rows1['id']; ?>"> View Details</a>
                                    </td>


                                </tr>
                        <?php

                            }
                        }

                        ?>



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