<?php
include('session.php');
// Database connection
include("admin_panel/database_connection.php");

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>

</head>

<body>
    <?php include('nav.php'); ?>

    <div class="section-two">
        <div class=" container">

            <div class="row ">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 section-one-a">
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'All')" id="defaultOpen">All Courses</button>


                        <?php
                        $query = "select cat.categories_id cat_id, cat.categories_name cat_name, COUNT(c.id) count_name FROM course c, categories cat WHERE cat.categories_id=c.categories_id group BY cat.categories_name";
                        $res = mysqli_query($con, $query);

                        while ($rows = mysqli_fetch_array($res)) {



                        ?>
                            <button class="tablinks" onclick="openCity(event, '<?php echo $rows['cat_id']; ?>')"><?php echo $rows['cat_name'];



                                                                                                                    echo "(" . $rows['count_name'] . ")"; ?></button>
                        <?php

                        }
                        ?>
                        <!-- <button class="tablinks" onclick="openCity(event, 'Administration')"></button>
                <button class="tablinks" onclick="openCity(event, 'Development')"></button>
                
                <button class="tablinks" onclick="openCity(event, 'IT')"></button>
                <button class="tablinks" onclick="openCity(event, 'Other')">Other(1)</button> -->

                    </div>





                </div>


                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 section-two-b">





                    <div id="All" class="tabcontent">
                        <div class="row">
                            <?php
                            $query1 = "select c.id, c.title, c.date, c.session  from course c ";
                            $result1 = mysqli_query($con, $query1);

                            ?>


                            <?php
                            while ($rows = mysqli_fetch_array($result1)) {
                            ?>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                    <div class="course-card-space">
                                        <div class="card-space">
                                            <div class="card text-white bg-success" style="width: 28rem;">

                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row">

                                                            <div class="col-md-3 col-sm-12">
                                                                <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                            </div>
                                                            <div class="col-md-9 col-sm-12">
                                                                <a href="course.php?courseId=<?php echo $rows['id']; ?>" id="subject">
                                                                    <p class=" custom-link text-light"><?php echo $rows['title']; ?> </p>
                                                                </a>
                                                                <span class="couse-date">
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                    <?php echo $rows['date']; ?> (<?php echo $rows['session']; ?>)
                                                                </span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <!-- yyyyyyyyyyyyyyyyy -->
                                    <!-- <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class='fas fa-certificate'></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12 ">
                                                            <a href="course.html">
                                                                <p class="custom-link text-light">Result Based Monitoring</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                24-26 Nov (session 2)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class='fas fa-desktop'></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Reporting Automation with Microsoft</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class="fa fa-user-o" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Leadership for Administration</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class='fas fa-desktop'></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Reporting Automation with Microsoft</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class='fas fa-desktop'></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Reporting Automation with Microsoft</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>





                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-window-restore'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Microsoft Excel Beginners</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class="fa fa-calculator" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Tally.ERP 9 Training </p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class="fa fa-calculator" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Income Tax Return for Individual</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class='fas fa-desktop'></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Reporting Automation with Microsoft</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class="fa fa-user-o" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Front Desk Management </p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->
                                    <!-- <div class="course-card-space">
                                    <div class="card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class='fas fa-desktop'></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.html">
                                                                <p class=" custom-link text-light">Reporting Automation with Microsoft</p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                27-30 Nov (session 4)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->




                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                    $query = "select c.id cid, c.title, c.date,c.session, ca.categories_name, ca.categories_id category from course c, categories ca where ca.categories_id=c.categories_id ";
                    $result = mysqli_query($con, $query);
                    while ($cata = mysqli_fetch_array($result)) {
                    ?>
                        <div id="<?php echo $cata['category']; ?>" class="tabcontent">
                            <div class="row">



                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="course-card-space">
                                        <div class="card text-white bg-success" style="width: 28rem;">

                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <i style="font-size: 40px; margin-left: 10px;" class="fa fa-calculator" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <a href="course.php?courseId=<?php echo $cata['cid']; ?> ">
                                                                <p class=" custom-link text-light"><?php echo $cata['title']; ?> </p>
                                                            </a>
                                                            <span class="couse-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                                                <?php echo $cata['date']; ?> (<?php echo $cata['session']; ?>)
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!--  <div id="Development" class="tabcontent">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Infection Prevention & Controls</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Infection Prevention & Controls</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Infection Prevention & Controls</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Infection Prevention & Controls</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>



                    <div id="Administration" class="tabcontent">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class="fa fa-user-o" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Leadership for Administration</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class="fa fa-user-o" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Front Desk Management </p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Infection Prevention & Controls</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="IT" class="tabcontent">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-certificate'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Result Based Monitoring</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-window-restore'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Microsoft Excel Beginners</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="Other" class="tabcontent">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="course-card-space">
                                    <div class="card text-white bg-success" style="width: 28rem;">

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <i style="font-size: 40px; margin-left: 10px;" class='fas fa-medkit'></i>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <a href="course.html">
                                                            <p class=" custom-link text-light">Infection Prevention & Controls</p>
                                                        </a>
                                                        <span class="couse-date">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>

                                                            24-26 Nov (session 2)
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                            </div>
                        </div>
                    </div> -->








                    <script>
                        function openCity(evt, cityName) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }
                            tablinks = document.getElementsByClassName("tablinks");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].className = tablinks[i].className.replace(" active", "");
                            }
                            document.getElementById(cityName).style.display = "block";
                            evt.currentTarget.className += " active";
                        }
                        // Get the element with id="defaultOpen" and click on it
                        document.getElementById("defaultOpen").click();
                    </script>

                </div>





            </div>






        </div>
    </div>





    <div class="">

        <div class="rd-part">
            <div class="row" style="padding: 30px;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <h1>Recent Photo</h1>
                    <p>
                        Professionals acquire and sharpen their marketable skills to step up to take their career to the next level through various training programs and workshops offered by Bdjobs.com Ltd.
                    </p>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/w.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/w.jpg" alt="Second slide">
                            </div>
                            <!-- <div class="carousel-item">
                                <img class="d-block w-100" src="images/five.jpg" alt="Third slide">
                            </div> -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <div class="card1" id="card-1">
                                <div class="card-body text-center">
                                    <h1>1000<span>+</span></h1>

                                    <p>Regular training <br>
                                        program</p>
                                </div>
                            </div>
                            <div class="card1 " id="card-2">
                                <div class="card-body text-center">
                                    <h1> 2500<span>+</span></h1>
                                    <p>Participants attended <br>
                                        in last 10 years</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <div class="card1 " id="card-3">
                                <div class="card-body text-center">
                                    <h1>
                                        250<span>+</span>
                                    </h1>
                                    <p>
                                        Trainers are involved in <br>
                                        training programs
                                    </p>
                                </div>
                            </div>
                            <div class="card1" id="card-4">
                                <div class="card-body text-center">
                                    <h1>
                                        1,500<span>+</span>
                                    </h1>
                                    <p>
                                        Client Organizations take <br>
                                        our training

                                    </p>
                                </div>
                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>

    </div>

    </div>












    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>