<?php
// Database connection
include("admin_panel/database_connection.php");
include('session.php');
$cid=$_GET['category'];
$query = "select DISTINCT categories.categories_name, course.id, course.title,course.price,course.date, trainer.trainer_id,trainer.picture,trainer.name from course, trainer,categories where course.trainer_id=trainer.trainer_id and categories.categories_id=course.categories_id and course.categories_id=$cid";
$res = mysqli_query($con, $query);
//$result = mysql_query($query);
?>




<!DOCTYPE html>
<html lang="en">

<head> 
    
    <?php include ('head.php');?>
    
</head>

<body>
<?php include 'nav.php';?>
    <div class="contain">

        <div class="container-fluid" style="padding: 70px;">
            <div class="row">

                <?php while ($rows = mysqli_fetch_array($res)) {
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

                                        <a href="#" id="icon-2"><i class="fas fa-angle-double-up"></i> <?php echo $rows['categories_name']; ?></a>

                                        <div class="button1">
                                            <form action="categories_register.php" method="post">
                                                <input type="hidden" name="course_id" value="<?php echo $rows['id']; ?>">
                                                <?php
                                                if (isset($_SESSION['login_user'])) {
                                                    $user_name = $_SESSION['login_user'];

                                                    $result2 = mysqli_query($con, "SELECT * FROM registration WHERE username='$user_name'");
                                                    $data = mysqli_fetch_assoc($result2);
                                                    $user_id = $data['id'];
                                                ?>
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                    <?php

                                                    $sql = "SELECT * FROM course_registration WHERE registration_id = '$user_id' and course_id ='$rows[id]'";
                                                    $result = mysqli_query($con, $sql);
                                                    $count = mysqli_num_rows($result);

                                                    if ($count > 0) {

                                                    ?>
                                                        <a href="completeReg.php?tid=<?php echo $rows['id']; ?> " type="submit" name="registered" class="btn btn-outline-success">Pay Online</a>
                                                    <?php
                                                    } else {
                                                    ?>

                                                        <button type="submit" name="register" class="btn btn-outline-success">Register</button>

                                                <?php
                                                    }
                                                } else {
                                                ?>
                                                     <a href="register_sign.php?tid=<?php echo $rows['id']; ?> " type="submit" name="nigar" class="btn btn-outline-success">Register</a>
                                                     <a href="wishlist_sign.php?tid=<?php echo $rows['id']; ?> " type="submit" name="nigar" class="btn btn-outline-success">Add to Wishlist</a>
                                               <?php
                                                }

                                                ?>
                                            </form>

                                            <!-- wishlist -->
                                            <form action="wishlist_part.php" method="post">
                                                <input type="hidden" name="course_id" value="<?php echo $rows['id']; ?>">
                                                <?php
                                                if (isset($_SESSION['login_user'])) {
                                                    $user_name = $_SESSION['login_user'];

                                                    $result3 = mysqli_query($con, "SELECT * FROM registration WHERE username='$user_name'");
                                                    $data = mysqli_fetch_assoc($result3);
                                                    $user_id = $data['id'];
                                                ?>
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                    <?php

                                                    $sql3 = "SELECT * FROM course_wishlist WHERE registration_id = '$user_id' and course_id ='$rows[id]'";
                                                    $result3 = mysqli_query($con, $sql3);
                                                    $rows = mysqli_fetch_array($result3);
                                                    $count2 = mysqli_num_rows($result3);

                                                    if ($count2 > 0) {

                                                    ?>


                                                        <a href="remove_wishlist.php? tid=<?php echo $rows['wish_id']; ?>" class="btn btn-outline-success"> Remove wishlist</a>


                                                    <?php
                                                    } else {
                                                    ?>

                                                        <button type="submit" name="wishlist" class="btn btn-outline-success">Add Wishlist</button>
                                            </form>
                                    <?php
                                                    }
                                                } else {
                                                }

                                    ?>







                                    <!-- <button type="button" class="btn btn-outline-success">wishlist</button> -->
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>


                    </div>
                <?php
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
    <?php include('footer.php'); ?>


    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>