<?php
// Database connection
include("database_connection.php");

?>

<?php
$query = "select r.id , COUNT(r.id) count_name FROM registration r";
$res = mysqli_query($con, $query);
$rows = mysqli_fetch_assoc($res);
?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
  <div class="col-xl-3 col-md-4">
    <div class="card bg-primary text-white mb-4">

      <?php
      $query = "select r.id , COUNT(r.id) count_name FROM registration r";
      $res = mysqli_query($con, $query);
      $rows = mysqli_fetch_assoc($res);
      ?>

      <div class="card-body">
        <span>
          <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows['count_name'] . ")"; ?></h4>
        </span>
      </div>
      <p class="count" style="text-align: center;font-size:20px">Total Students</p>
      <div class=" card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>


    </div>
  </div>
  <div class="col-xl-3 col-md-4">
    <div class="card bg-warning text-white mb-4">
      <?php
      $query1 = "select c.id , COUNT(c.id) count_name FROM course c";
      $res1 = mysqli_query($con, $query1);
      $rows1 = mysqli_fetch_assoc($res1);
      ?>
      <div class="card-body">
        <span>
          <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows1['count_name'] . ")"; ?></h4>
        </span>
      </div>
      <p class="count" style="text-align: center;font-size:20px">Total Courses</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-4">
    <div class="card bg-success text-white mb-4">
      <?php
      $query2 = "select t.trainer_id , COUNT(t.trainer_id) count_name FROM trainer t";
      $res2 = mysqli_query($con, $query2);
      $rows2 = mysqli_fetch_assoc($res2);
      ?>
      <div class="card-body">
        <span>
          <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows2['count_name'] . ")"; ?></h4>
        </span>
      </div>
      <p class="count" style="text-align: center;font-size:20px">Total Trainers</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-danger text-white mb-4">
      <?php
      $query2 = "select cat.categories_id , COUNT(cat.categories_id) count_name FROM categories cat";
      $res2 = mysqli_query($con, $query2);
      $rows2 = mysqli_fetch_assoc($res2);
      ?>
      <div class="card-body">
        <span>
          <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows2['count_name'] . ")"; ?></h4>
        </span>
      </div>
      <p class="count" style="text-align: center;font-size:20px">Total Categories</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i>
    Recent Enrolled Students
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SERIAL</th>
            <th>TITLE</th>
            <th>NAME</th>
            <th>APPROVED DATE</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $serial = 1;
          $query3 = "SELECT c.id, c.title, cr.course_id,cr.registration_id,cr.approved_date,concat(r.fname,' ',r.lname) AS FullName from course c, course_registration cr, registration r where cr.course_id= c.id and cr.registration_id=r.id and status=1 order by approved_date DESC limit 20";
          $res3 = mysqli_query($con, $query3);
          while ($rows3 = mysqli_fetch_assoc($res3)) {


          ?>
            <tr>
              <td><?php echo $serial++; ?></td>
              <td><?php echo $rows3['title']; ?></td>
              <td><?php echo $rows3['FullName']; ?></td>
              <td><?php echo $rows3['approved_date']; ?></td>

            </tr>
          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>