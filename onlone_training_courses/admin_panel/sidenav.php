<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
    <div class="nav">
      <div class="sb-sidenav-menu-heading">Core</div>
      <a class="nav-link" href="index.php">
        <div class="sb-nav-link-icon">
          <i class="fas fa-tachometer-alt"></i>
        </div>
        Dashboard
      </a>
      <div class="sb-sidenav-menu-heading">Interface</div>
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon">
          <i class="fas fa-columns"></i>
        </div>
        Courses
        <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
        </div>
      </a>
      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link" href="add_course.php">Add Course</a>
          <a class="nav-link" href="add_course_display.php">Show Courses</a>
          <a class="nav-link" href="course_schedule.php">Add Course Schedule</a>
          <a class="nav-link" href="schedule_display.php">Show Schedule</a>
        </nav>
      </div>

      <!--  -->
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutss" aria-expanded="false" aria-controls="collapseLayoutss">
        <div class="sb-nav-link-icon">
          <i class="fas fa-columns"></i>
        </div>
        Categories
        <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
        </div>
      </a>
      <div class="collapse" id="collapseLayoutss" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link" href="add_categories.php">Add Categories</a>
          <a class="nav-link" href="add_categories_dispaly.php">Show Categories</a>
        </nav>
      </div>

      <!--  -->
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
        <div class="sb-nav-link-icon">
          <i class="fas fa-book-open"></i>
        </div>
        Trainers
        <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
        </div>
      </a>
      <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
            <a class="nav-link" href="add_trainer.php">Add Trainer</a>
            <a class="nav-link" href="add_trainer_display.php">Show Trainers</a>
            <!-- <div class="sb-sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div> -->
          </a>
          <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="login.html">Login</a>
              <a class="nav-link" href="register.html">Register</a>
              <a class="nav-link" href="password.html">Forgot Password</a>
            </nav>
          </div>
          <!-- <a
                    class="nav-link collapsed"
                    href="#"
                    data-toggle="collapse"
                    data-target="#pagesCollapseError"
                    aria-expanded="false"
                    aria-controls="pagesCollapseError"
                  > -->
          <!-- Error
                    <div class="sb-sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </a> -->
          <!-- <div
                    class="collapse"
                    id="pagesCollapseError"
                    aria-labelledby="headingOne"
                    data-parent="#sidenavAccordionPages"
                  >
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="401.html">401 Page</a>
                      <a class="nav-link" href="404.html">404 Page</a>
                      <a class="nav-link" href="500.html">500 Page</a>
                    </nav>
                  </div> -->
        </nav>
      </div>
      <!-- <div class="sb-sidenav-menu-heading">Addons</div>
      <a class="nav-link" href="charts.html">
        <div class="sb-nav-link-icon">
          <i class="fas fa-chart-area"></i>
        </div>
        Charts
      </a>
      <a class="nav-link" href="tables.html">
        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
        Tables
      </a> -->
    </div>
  </div>
  <div class="sb-sidenav-footer">
    <?php
    if (isset($_SESSION['admin_user_name'])) { ?>
      <div class="small"><?php echo "Logged in as: "; ?> <h4><?php echo $_SESSION['admin_user_name']; ?></h4>
      </div>
  </div>
<?php
    }
?>
</nav>