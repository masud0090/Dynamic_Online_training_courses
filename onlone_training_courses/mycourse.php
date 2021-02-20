<?php

 //check if session exists?

 include('session.php');
// Database connection
include("admin_panel/database_connection.php");

//$result = mysql_query($query);


if (isset($_SESSION['login_user_id'])) {
    $user = $_SESSION['login_user_id'];
    $query = "SELECT c.trainer_id , c.id, c.title, c.price, c.date, cr.registration_id, cr.course_id,t.trainer_id ,t.picture,t.name FROM course c, trainer t , course_registration cr WHERE c.trainer_id=t.trainer_id AND c.id=cr.course_id and cr.registration_id=$user";
    $res2 = mysqli_query($con, $query);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php');?>
    
    <title>Accounts</title>
</head>

<body>
<?php include ('nav.php');?>



    <div class="contain">

        <div class="container-fluid" style="padding: 70px;">
            <div class="row">

                <?php 
                $count = mysqli_num_rows($res2);
                if ($count == 0) {
                    ?>
                 
                       <h2>You dont have any course registered</h2>
                    <?php

                }else{

                
                
                while ($rows = mysqli_fetch_array($res2)) {
                 
                 

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                        <div class="cont" style="margin-top: 20px;">

                            <div class="fist" style="padding: 35px; background-color: #7e58e2;">

                                <div class="row" style="min-height: 80px;">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <i class="fal fa-calculator-alt" id="subject" style="font-size: 40px;"></i>

                                    </div>
                                    <div class="col-lg-10 col-md-10col-sm-12 col-xs-12">

                                        <h5>

                                            <a href="course.php?courseId=<?php echo $rows['id']; ?>" id="subject"><?php echo $rows['title']; ?></a>
                                        </h5>

                                    </div>

                                </div> <br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="price">

                                            Price <?php echo $rows['price']; ?>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="down">
                                <img src="images/<?php echo $rows['picture']; ?>" class="rounded-circle" alt="Cinque Terre" width="70px" height="70px" style="margin-left: 60px; margin-top: -20px;">
                                <b><?php echo $rows['name']; ?></b>
                                <br>



                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                                        <div class="icon">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Not Registered"><i class="fal fa-chevron-square-down"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Not wishlisted"><i class="far fa-heart"></i></a>
                                            <!-- <i class="fal fa-chevron-square-down"  ></i>
                    <i class="far fa-heart"></i> -->
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div id="date">
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo $rows['date']; ?>
                                        </div> <br>
                                        <p style="text-align: center;">
                                            You can save money and avoid hassle regarding submission of ...
                                        </p>

                                        <hr>

                                        <a href="#" id="icon-2"><i class="fas fa-angle-double-up"></i> Accounts</a>

                                        <div class="button1">
                                           <?php
                                           $c_id=$rows['id'];
                                           $r_id1=
                                            $ar_query="select distinct cr.status from  course_registration cr WHERE cr.registration_id=$user and cr.course_id=$c_id";
                                            $ar_res=mysqli_query($con, $ar_query);
                                            $ar_rows=mysqli_fetch_array($ar_res);
                                            $u_status=$ar_rows['status'];
                                            if($u_status==1){

                                                ?>
                                           
                                            
                                            <a type="button" class="btn btn-outline-success" disabled >Approved</a>
                                            <?php
                                            }else if($u_status==2){

                                           ?>


                                            <a type="button" class="btn btn-outline-danger" disabled >Rejected</a>
                                            <?php
                                            }else{
                                            ?>
                                            <a type="button" class="btn btn-outline-info" disabled >Pending</a>
                                            <?php
                                            }
                                            ?>
                                           

                                            <a href="completeReg.php?tid=<?php echo $rows['id']; ?> " type="submit" name="registered" class="btn btn-outline-success">Pay Online</a>


                                            <!-- wishlist -->








                                            <!-- <button type="button" class="btn btn-outline-success">wishlist</button> -->
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>


                    </div>
                <?php
                }
            }
                ?>




                <!--   <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">




                    <div class="cont" style="padding: 00px;">

                        <div class="fist" style="padding: 35px; background-color: #7e58e2;">

                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <i class="fal fa-calculator-alt" id="subject" style="font-size: 40px;"></i>

                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                    <h5>

                                        <a href="course.html" id="subject">Income Tax Return for Individual</a>
                                    </h5>

                                </div>

                            </div> <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="price">

                                        Price 1,500 Tk + VAT

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="down">
                            <img src="images/rana.jpg" class="rounded-circle" alt="Cinque Terre" width="70px" height="70px" style="margin-left: 60px; margin-top: -20px;">
                            <b>Masud Rana</b>
                            <br>



                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                                    <div class="icon">

                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Not Registered"><i class="fal fa-chevron-square-down"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Not wishlisted"><i class="far fa-heart"></i></a>
                                        <!-- <i class="fal fa-chevron-square-down"></i>
                      <i class="far fa-heart"></i> -->
            </div>
        </div>



    </div>

    <!-- <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div id="date">
                <i class="far fa-calendar-alt"></i>
                4 - 5 Dec 2020 (2 Sessions)
            </div> <br>
            <p style="text-align: center;">
                Hi, Having good spreadsheet skills therefore gives you the ...
            </p>

            <hr>

            <a href="#" id="icon-2"><i class="fas fa-angle-double-up"></i>Accounts</a>

            <div class="button1">
                <button type="button" class="btn btn-outline-success">Register</button>
                <button type="button" class="btn btn-outline-success">wishlist</button>
            </div>
        </div>
    </div> -->

    <!-- </div>



    </div>





    </div>

    </div>

    <br> <br>

    <!-- <div class="row">


        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

            <div class="cont" style="padding: 00px;">

                <div class="fist" style="padding: 35px; background-color: #7e58e2;">

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <i class="fal fa-calculator-alt" id="subject" style="font-size: 40px;"></i>

                        </div>
                        <div class="col-lg-10 col-md-10col-sm-12 col-xs-12">

                            <h5>

                                <a href="course.html" id="subject">QuickBook Accounting Software for Beginners</a>
                            </h5>

                        </div>

                    </div> <br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="price">

                                Price 1,500 Tk + VAT

                            </div>


                        </div>
                    </div>
                </div>
                <div class="down">
                    <img src="images/rana.jpg" class="rounded-circle" alt="Cinque Terre" width="70px" height="70px" style="margin-left: 60px; margin-top: -20px;">
                    <b>Masud Rana</b>
                    <br>



                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                            <div class="icon">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Not Registered"><i class="fal fa-chevron-square-down"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Not wishlisted"><i class="far fa-heart"></i></a>
                                <!-- <i class="fal fa-chevron-square-down"  ></i>
                    <i class="far fa-heart"></i> -->
    <!-- </div>
    </div>



    </div> -->

    <!-- <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div id="date">
                <i class="far fa-calendar-alt"></i>
                4 - 5 Dec 2020 (2 Sessions)
            </div> <br>
            <p style="text-align: center;">
                Hi, Having good spreadsheet skills therefore gives you the...
            </p>

            <hr>

            <a href="#" id="icon-2"><i class="fas fa-angle-double-up"></i> Accounts</a>

            <div class="button1">
                <button type="button" class="btn btn-outline-success">Register</button>
                <button type="button" class="btn btn-outline-success">wishlist</button>
            </div>
        </div>
    </div> -->

    <!-- </div>



    </div>


    </div> -->

    <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

        <div class="cont" style="padding: 00px;">

            <div class="fist" style="padding: 35px; background-color: #7e58e2;">

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <i class="fal fa-calculator-alt" id="subject" style="font-size: 40px;"></i>

                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                        <h5>

                            <a href="course.html" id="subject">QuickBooks Accounting Software</a>
                        </h5>

                    </div>

                </div> <br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price">

                            Price 1,500 Tk + VAT

                        </div>


                    </div>
                </div>
            </div>
            <div class="down">
                <img src="images/rana.jpg" class="rounded-circle" alt="Cinque Terre" width="70px" height="70px" style="margin-left: 60px; margin-top: -20px;">
                <b>Masud Rana</b>
                <br>



                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                        <div class="icon">

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Not Registered"><i class="fal fa-chevron-square-down"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Not wishlisted"><i class="far fa-heart"></i></a>
                            <!-- <i class="fal fa-chevron-square-down"></i>
                    <i class="far fa-heart"></i> -->
    <!-- </div>
    </div>



    </div> -->

    <!-- <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div id="date">
                <i class="far fa-calendar-alt"></i>
                4 - 5 Dec 2020 (2 Sessions)
            </div> <br>
            <p style="text-align: center;">
                Hi, Having good spreadsheet skills therefore gives you the ...
            </p>

            <hr>

            <a href="#" id="icon-2"><i class="fas fa-angle-double-up"></i> Accounts</a>

            <div class="button1">
                <button type="button" class="btn btn-outline-success">Register</button>
                <button type="button" class="btn btn-outline-success">wishlist</button>
            </div>
        </div>
    </div> -->

    <!-- </div>



    </div>


    </div> -->

    <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">




        <div class="cont" style="padding: 00px;">

            <div class="fist" style="padding: 35px; background-color: #7e58e2;">

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <i class="fal fa-calculator-alt" id="subject" style="font-size: 40px;"></i>

                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                        <h5>

                            <a href="course.html" id="subject">Reporting Automation <br> with Microsoft Excel</a>
                        </h5>

                    </div>

                </div> <br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price">

                            Price 1,500 Tk + VAT

                        </div>


                    </div>
                </div>
            </div>
            <div class="down">
                <img src="images/rana.jpg" class="rounded-circle" alt="Cinque Terre" width="70px" height="70px" style="margin-left: 60px; margin-top: -20px;">
                <b>Masud Rana</b>
                <br>



                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                        <div class="icon">

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Not Registered"><i class="fal fa-chevron-square-down"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Not wishlisted"><i class="far fa-heart"></i></a>
                            <!-- <i class="fal fa-chevron-square-down"></i>
                      <i class="far fa-heart"></i> -->
    <!-- </div>
    </div>



    </div> -->

    <!-- <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div id="date">
                <i class="far fa-calendar-alt"></i>
                4 - 5 Dec 2020 (2 Sessions)
            </div> <br>
            <p style="text-align: center;">
                Hi, Having good spreadsheet skills therefore gives you the ...
            </p>

            <hr>

            <a href="#" id="icon-2"><i class="fas fa-angle-double-up"></i> Accounts</a>

            <div class="button1">
                <button type="button" class="btn btn-outline-success">Register</button>
                <button type="button" class="btn btn-outline-success">wishlist</button>
            </div>
        </div>
    </div> -->

    <!-- </div>



    </div>





    </div>

    </div>






    </div> -->
     
    </div>
    <?php include('footer.php');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
}else{
    header("location:mainindex.php");
}
?>

