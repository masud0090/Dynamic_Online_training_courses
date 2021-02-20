<?php
// Database connection
include("admin_panel/database_connection.php");
// session_start();
//include_once('connect.php');
include('session.php');
$cid = $_REQUEST['courseId'];
$sql_query = "SELECT c.trainer_id trainer, c.id, c.title, c.price, c.duration, c.session, c.deadline, c.date, c.description, t.name, t.picture,t.trainer_info, t.specialist FROM course c, trainer t , course_schedule cs WHERE c.trainer_id=t.trainer_id AND cs.course_id=c.id and c.id=$cid ";

$sql_res = mysqli_query($con, $sql_query);
$course_rows = mysqli_fetch_assoc($sql_res);
$tid = $course_rows['trainer'];
//$result = mysql_query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>

    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="course.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>LAST PAGE</title> -->
</head>

<body>
    <?php include('nav.php'); ?>

    <div class="row" style="background-color: #26a65b;">
        <div class="container">

            <div class="clo-lg-8 col-md-8 col-sm-12 col es-12">

                <div class="A">

                    <a href="#">Daylong Course</a> <br> <br>
                    <h2>
                        <?php echo $course_rows['title']; ?>
                    </h2>

                    <div class="date">
                        <!-- <> -->
                        <i class="far fa-calendar-week"></i>
                        Date : <?php echo $course_rows['date']; ?>
                        <!-- </>  -->
                        <!-- <> -->
                        <i class="far fa-clock"></i> Duration : <?php echo $course_rows['duration']; ?>
                        <!-- </> -->
                    </div>

                    <div class="date">
                        <!-- <> -->
                        <i class="far fa-list"></i> No. of Classes/ Sessions : <?php echo $course_rows['session']; ?>
                        <!-- </> -->


                        <?php

                        $sid = $course_rows['id'];


                        $sql7 = "SELECT s.day FROM schedule s,course_schedule cs,course c where s.id=cs.schedule_id and cs.course_id=c.id and cs.course_id=$sid";
                        $result7 = mysqli_query($con, $sql7);
                        $days = '';
                        while ($dayrows = mysqli_fetch_array($result7)) {
                            $days .= $dayrows["day"] . ",";
                        }
                        $output = '<i class="far fa-clock"></i> Class Schedule :' . trim($days, ',') . '';
                        echo $output;
                        ?>







                        <!-- <> -->

                        <!-- </> -->
                        <!-- <> -->
                        <i class="far fa-clock"></i> Total Hours : 6
                        <!-- </> -->

                    </div>

                    <div class="date">
                        <p>
                            <i class="far fa-calendar-week"></i>
                            Last Date of Registration : <?php echo $course_rows['deadline']; ?>
                        </p>
                        <p>
                            <i class="far fa-clock"></i> Venue : Online Virtual
                        </p>
                    </div>


                </div>
                <b>(Enjoy 10% Discount on Bkash Payment & 25% Discount on EBL payment)</b>
            </div> <br>
        </div>
    </div>
    </div>


    <div class="secondview" style="background-color: #f5f5f5;">
        <div class="container">
            <br>
            <div class="row">


                <div class="clo-lg-8 col-md-8 col-sm-12 col es-12">
                    <!-- <h2>Introduction</h2> -->
                    <?php echo $course_rows['description']; ?>
                    <!-- <p>
                              
                <span style="font-family:SolaimanLipi, Roboto;">
                 Microsoft Excel has proven to be advantageous for day to day business activities. The knowledge of Microsoft Excel particularly in analyzing data and reporting has become essential for every company to carry out day to day business and reap the best results.<br>Reporting in Excel is the most vital role for every manager especially in Business Analysis, People Management, Managing Operations, Performance Reporting, Office Administration, Strategic Analysis, Project Management, Managing Programs, Production / Manufacturing, Contract Administration, Sales / Profit Center / Cost Center / Accounts Management, etc.<br>Reporting in Excel using Dashboard: A dashboard is an information management tool that is used to track KPIs, metrics, and other key data points relevant to a business, department, or specific process. Using data visualizations, dashboards simplify complex data sets to provide users with at a glance awareness of current performance. An Excel dashboard is one-pager (mostly, but not always necessary) that helps managers and business leaders in tracking key KPIs or metrics and take a decision based on it. It contains charts/tables/views that are backed by data. A dashboard is often called a report, however, not all reports are dashboards. Moreover, a dashboard is a communication platform that displays key reports in a single presentation.<br>Excel is widely used. Having good spreadsheet skills therefore gives you the ability to work on all sorts of different tasks. And you can more easily get value out of information that’s being shared in workbooks. Once you know how to use Excel, you’ll find yourself using it more and more. It’s an accessible platform that can be used to do both simple and highly sophisticated business tasks.<br><br>
                 </span>				  
                
                 
                 
                </p>

                <h2>Methodology</h2> 
                Live screen sharing,practice session
                <br> <br>
                <span style="font-family:SolaimanLipi, Roboto;">
                    <b>** Handling Text with Formulas and Built-in Tools</b><br>
                •     Drag the Fill Handler<br>
                •     Joining Text<br>
                •     Breaking Apart Text<br><br>

                <b>** Formulas Begins</b><br>
                •     AutoSum Tricks<br>
                •    Relative Versus Absolute Formulas<br>
                •     Defining Names<br>
                •     Tables and Table Formulas<br>
                •     Goal Seek<br><br>

                <b>** Advance Formulas</b><br>
                •    IF Formulas<br>
                •    Sumifs<br>
                •    VLOOKUP<br>
                •    Date and Time<br><br>

                <b>** Smart Reporting Tools without knowing any formula</b><br>
                Generate Reports automatically using Excel Tools for Subtotal, Min, Max, Average<br>
                Dig down Reports with the variables for example, company name, division, departments, profit center, cost center, location, job positions, etc.<br><br>

                <b>** Charting and SmartArt</b><br>
                •     Creating and Formatting a Chart<br>
                •     Adding or Removing Chart Data<br>
                •     Pie Chart Tricks<br>
                •     Sparkline<br>

                </span> -->


                    <br>
                    <button type="button" class="btn btn-primary">Email Traning Info</button>
                    <button type="button" class="btn btn-success">Share in Facebook</button>
                    <button type="button" class="btn btn-info">Share on Linkedin</button>
                    <button type="button" class="btn btn-warning">Share on google+</button>



                </div>


                <div class="clo-lg-4 col-md-4 col-sm-12 col es-12">




                    <div class="col-md-12">

                        <div class="pricing-table">
                            <h2>Price: <b><span class="green-text">Tk. 1,500+VAT</span></b></h2>
                            <p class="note">
                                (15% VAT is applicable in every purchase.)<br>


                            </p>


                            <div class="pay">
                                <form action="categories_register.php" method="post">
                                    <input type="hidden" name="course_id" value="<?php echo $course_rows['id']; ?>">
                                    <?php
                                    if (isset($_SESSION['login_user_id'])) {
                                        $user_name = $_SESSION['login_user'];

                                        $result2 = mysqli_query($con, "SELECT * FROM registration WHERE username='$user_name'");
                                        $data = mysqli_fetch_assoc($result2);
                                        $user_id = $data['id'];
                                    ?>
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <?php

                                        $sql9 = "SELECT * FROM course_registration WHERE registration_id = '$user_id' and course_id ='$course_rows[id]'";
                                        $result9 = mysqli_query($con, $sql9);
                                        $count9 = mysqli_num_rows($result9);

                                        if ($count9 > 0) {

                                        ?>
                                            <div style="padding:5px;">
                                                <button style="background-color:#F0F0F0;  min-width:101px; " type="button" class="btn " disabled>Already Registered</button> <br>


                                                <a style=" min-width:101px; margin-top:6px;color:white; background-color:#28a745;" href="completeReg.php?tid=<?php echo $course_rows['id']; ?> " type="submit" name="registered" class="btn">Pay Online</a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>

                                            <!-- <a  type="submit" name="register" class="btn btn-info">Register</a> -->
                                            <button type="submit" name="register" class="btn btn-outline-success">Register</button>

                                        <?php
                                        }
                                    } else {
                                        ?>

                                        <a href="register_sign.php?tid=<?php echo $course_rows['id']; ?> " type="submit" name="nigar" class="btn btn-info">Register</a>

                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>

                            <br>
                            <div class="wbtnt">
                                <form action="wishlist_part.php" method="post">
                                    <input type="hidden" name="course_id" value="<?php echo $course_rows['id']; ?>">
                                    <?php
                                    if (isset($_SESSION['login_user_id'])) {
                                        $user_name = $_SESSION['login_user'];

                                        $result3 = mysqli_query($con, "SELECT * FROM registration WHERE username='$user_name'");
                                        $data = mysqli_fetch_assoc($result3);
                                        $user_id = $data['id'];
                                    ?>
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <?php

                                        $sql3 = "SELECT * FROM course_wishlist WHERE registration_id = '$user_id' and course_id ='$course_rows[id]'";
                                        $result4 = mysqli_query($con, $sql3);
                                        $row2 = mysqli_fetch_array($result4);
                                        $count2 = mysqli_num_rows($result4);

                                        if ($count2 > 0) {

                                        ?>


                                            <a href="remove_wishlist.php? tid=<?php echo $row2['wish_id']; ?>" class="btn btn-success"> Remove wishlist</a>


                                        <?php
                                        } else {
                                        ?>

                                            <button type="submit" name="wishlist" class="btn btn-outline-success">Wishlist</button>
                                </form>
                            <?php
                                        }
                                    } else {

                            ?>
                            <a href="wishlist_sign.php?tid=<?php echo $course_rows['id']; ?> " type="submit" name="nigar" class="btn btn-outline-success">Add to Wishlist</a>


                        <?php

                                    }

                        ?>
                            </div>


                            <br>
                            <h3>
                                Contact
                            </h3>
                            <hr>
                            <p class="contact">
                                <i class="fas fa-phone-alt"></i> 01811487982, 01847213994, 01811487981
                            </p>

                            <p class="contact">
                                <i class="far fa-envelope"></i> <a href="mailto:workshop@bdjobs.com">workshop@jobs.com</a>
                            </p>
                        </div>

                    </div>


                    <br><br>




                    <!-- TOGGLEEEEEEEEEE -->



                    <div class="col-md-12">
                        <div class="accordion_menu">
                            <div class="">
                                <div class="panel-group" id="accordion1">
                                    <div class="panel panel-default tr_panel">
                                        <div class="panel-heading tr_ach" style="background-color: #26a65b;">
                                            <h3 class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" style="color: #f5f5f5;">
                                                    <span class="pull-right icon-plus"></span>
                                                    Who Can Attend <i class="fas fa-chevron-double-down" style="text-align: right;"></i>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px; background-color: #ffffff;">
                                            <div class="panel-body">
                                                <span style="font-family:SolaimanLipi, Roboto; ">
                                                    <b>Who Should Participate…</b><br>
                                                    ✔Anyone who is involved in reporting: Sales, Marketing, Manufacturing / Production Managers, Compensation &amp; Benefits / Training / HR Professionals, Administrative Managers, Accountants, Supply Chain / Procurement / Store / Warehouse Managers, Auditors, Professors, Teachers, Teaching Assistants, Project coordinators, project and construction managers, bankers, financial analysts, Market researchers, Business and Management Analysts<br>
                                                    ✔Managers and Directors, CEOs and business executives<br>
                                                    ✔Professionals seeking advancement to managerial position <br>

                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <br>


                    <div class="col-md-12">

                        <div class="rperson">

                            <h2 style="background-color: #26a65b;">Resource Person</h2>



                            <div class="text-center">
                                <img src="images/<?php echo $course_rows['picture']; ?>" class="rounded-circle" alt="Cinque Terre" width="75px" height="75px">
                            </div>



                            <p class="tr_name">
                                <?php echo $course_rows['name']; ?>
                            </p>
                            <p class="tr_tag">
                                <?php echo $course_rows['specialist']; ?>
                            </p>

                            <p class="tr_details" style="text-align:left; padding:5px; ">
                                <?php echo $course_rows['trainer_info']; ?>
                                <!-- Md. Feroz Kibria has been involved in training, coaching and consulting for more than 10 years with the intention of dramatically increasing profit, productivity and the performance of people.<br><br>

                                After completing his MBA &amp; BBA in HR &amp; Accounting, Feroz joined the corporate world and gaining experience in Human Resources Management and training in diversified industries e.g. Telecommunications, Networking Accessories, Customer Services, Engineering and Automobiles. <br><br>

                                He also completed a certificate course on “People Management Skills for Professionals (PMSP)” from IBA, University of Dhaka under MDP (Management Development Program). <br><br>

                                Through the experience from the local and multinational businesses operating in Bangladesh, Feroz has gained a versatile knowledge for the requirement of core development areas to build the strongest career. <br><br>

                                Today, Feroz trains a wide range of Soft Skills like Microsoft Office Programs (Excel, PowerPoint, Access, Publisher, Visio, Word, Outlook and others), Time Management, Strategic Compensation &amp; Benefits, Financial Modeling, Leadership &amp; Team Building, Corporate Etiquettes, etc. <br><br>

                                Feroz is passionate in inspiring lives and transforming people. Because of the dedication, he is well known for his energetic and power-packed training sessions. <br><br>

                                His quest for continuous Human &amp; Talent Development promises highly energizing and power-packed training style. He helps clients transferring knowledge into ready-to-use skills. <br><br> -->
                                <br>

                                <br>


                            </p>



                        </div>
                    </div>

                    <!-- LASTTTTTTTT -->
                    <div class="col-md-12">
                        <div class="accordion_menu">
                            <div class="">
                                <div class="panel-group" id="accordion4">
                                    <div class="panel panel-default tr_panel">
                                        <div class="panel-heading tr_ach">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseFour" style="color: #f5f5f5;">
                                                    <span class="pull-right icon-plus"></span>

                                                    Courses from this trainer <i class="fas fa-chevron-double-down"></i>


                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">

                                                <br>


                                                <?php
                                                $query90 = "select c.title, c.session  from course c, trainer t where c.trainer_id=t.trainer_id and t.trainer_id=$tid";
                                                $result90 = mysqli_query($con, $query90);
                                                while ($train = mysqli_fetch_array($result90)) {
                                                ?>
                                                    <div class="single-job">
                                                        <!-- <ul>
                 -->


                                                        <p class="jtitle">

                                                            <a href="trainingdetails.asp?TrainingId=38435&amp;upcoming=1">

                                                                <span><?php echo $train['title']; ?></span>

                                                                <span class="badge">(<?php echo $train['session']; ?>)</span><br>
                                                                <span class="jpos">
                                                                </span>
                                                                <!-- <p class="jtitle">
                          
                          <a href="trainingdetails.asp?TrainingId=38646&amp;upcoming=1">
                                        </span>
                                                            </a>
                                                        </p>

                                                        <hr>


                                          
                         <span><?php echo $course_rows['title']; ?></span>
                         
                         <span class="badge">(9 Times)</span><br>
                         <span class="jpos">
                        </span>
                         </a>
                      </p>
                   
                   <hr>
                   
                   
                      <p class="jtitle">
                          
                            <a href="trainingdetails.asp?TrainingId=38831&amp;upcoming=1">
                         
                         <span><?php echo $course_rows['title']; ?></span>
                         
                         <span class="badge">(8 Times)</span><br>
                         <span class="jpos">
                         </span>
                         </a>
                      </p>
                   
                   <hr>
                   
                   
                      <p class="jtitle">
                          
                            <a href="trainingdetails.asp?TrainingId=38998&amp;upcoming=1">
                         
                         <span></span>
                         
                         <span class="badge">(1 Time)</span><br>
                         <span class="jpos">
                         </span>
                         </a>
                      </p>
                   
                   <hr>
                   
                   
                      <p class="jtitle">
                          
                           <a href="trainingdetails.asp?TrainingId=96063 &amp;upcoming=0">
                           
                         <span>/span>
                         
                         <span class="badge">(3 Times)</span><br>
                         <span class="jpos">
                         </span>
                         </a>
                      </p>
                   
                   <hr>
                   
                   
                      <p class="jtitle">
                          
                            <a href="trainingdetails.asp?TrainingId=39029&amp;upcoming=1">
                         
                         <span></span>
                         
                         <span class="badge">(1 Time)</span><br>
                         <span class="jpos">
                         </span>
                         </a>
                      </p> -->


                                                                <!-- </ul> -->
                                                    </div>

                                                <?php
                                                }
                                                ?>




                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>

            </div>

        </div>
        <br>
    </div>
    <?php include('footer.php'); ?>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>