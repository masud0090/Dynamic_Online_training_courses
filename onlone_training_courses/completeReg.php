<?php
$conn = new mysqli('localhost', 'root', '', 'bdjobs_course');
//include_once('connect.php');
$id = $_GET['tid'];
$sql = "select * FROM course WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$query = "select course.*, categories.* from course, categories where course.categories_id=categories.categories_id";
$res = mysqli_query($conn, $query);

//$result = mysql_query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="completeReg.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="reg">

        <div class="section-one-nav ">

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Brand/logo -->
                <a class="" href="#">
                    <img src="images/bdjobs_logo_svg_color.svg" width="40px" height="30px" alt="">
                </a>

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">JOBS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MYBDJOBS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">TRAINING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">EMPLOYERS</a>
                    </li>

                    </li>
                </ul>
                <div class="upbtn">
                    <div class="btn11">
                        <a class="btn btn-primary" href="signup2.php" role="button">SIGN UP</a>
                    </div>
                </div>

                <!-- jjjjjjjjj -->
                <!-- <div> -->



                <div class="btnn2" style=" position: absolute; right: 150px;">

                    <?php
                    session_start();

                    //check if session exists?
                    if (isset($_SESSION['login_user_id'])) {
                    ?>


                        <div class="dropdown" style="padding: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php



                                echo "Welcome " . $_SESSION['login_user'];

                                ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">My course</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="signout.php">Sign Out</a>
                            </div>
                        </div>

                        <!-- </div>
           </div>
           </div>
           </div> -->
                        <!-- </div> -->



                    <?php
                    } else {
                    ?>
                        <div class="tsin dropdown"><a href="#" class="btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">Sign In</a>

                            <div class="dropdown-menu stop-propagation">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="ulc-container">

                                            <form action="signin_connect.php" method="post" id="loginform">
                                                <input name="username" id="userNameTextBox" class="form-control" placeholder="Username" type="text">
                                                <span id="userNamSpan"></span>
                                                <br>
                                                <input id="passwordTextBox" name="password" class="form-control" placeholder="Password" type="password">
                                                <td><span id="passwordSpan"></span></td>
                                                <br>
                                                <input class="btn btn-success" data-toggle="tooltip" data-placement="bottom" id="submitButton" title="" value="Sign In" name="submit" type="submit">
                                                <span id="messageSpan"></span>
                                                <!-- <img id="loadingImg" src="demo_wait.gif" /> -->

                                                <!-- <a class="for-pass" href="" target="" onclick="">Forgot password?</a> -->



                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }








                    ?>



                    <!-- <hr> -->



                </div>


                <!-- </div> -->

                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->



                <!-- </div> -->
            </nav>
        </div>



        <div class="row biglogo-space">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">

                <div class="biglogo">
                    <img src="images/logo.png">
                    <a id="btn2" class="btn btn-primary" href="index.html" role="button">HOME</a>
                </div>


            </div>




            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                <div class="wrap">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="What are you looking for?">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>



                    </div>

                </div>


            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <button class="openbtn" onclick="openNav()">☰ Browse Courses</button>
            </div>

        </div>




        <div>
            <div id="mySidenav" class="sidenav">
                <h5>Browse Courses&nbsp;&nbsp;</h5>
                <a style="color: inherit;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div class="sidenav-content">
                    <a style="color: inherit;" class="sidenav-a" target="blank" href="account.html">Accounts</a>
                    <a style="color: inherit;" target="blank" href="administration.html">Administration</a>
                    <a style="color: inherit;" target="blank" href="development.html">Development</a>
                    <a style="color: inherit;" target="blank" href="it.html">IT</a>
                    <a style="color: inherit;" href="other.html">Other</a>
                </div>
            </div>

            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                    document.getElementById("main").style.marginLeft = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginLeft = "0";
                }
            </script>
        </div>



















        <div id="DivRegistrationInfoPoint" line="150" style="margin:5%;font-family: Roboto;">
            <h3> You have successfully Registered to this training </h3>
        </div>
        <div style="padding:73px;" class="workshopDesc">
            <form id="form1" name="form1" method="post" action="TrainingParticipantConfirmation.asp">
                <table width="100%" border="0" align="" style="font-family:Roboto;font-size:12pt;">
                    <tbody>
                        <tr>
                            <td width="100%" class="workshopDesc" align="">
                                <!--  <strong>Your Registration is successfully submitted.</strong>  -->
                                <h3> Online Payment </h3>


                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td align="">
                                TrainingName = <?php echo $row['title']; ?> <br><br>
                                Venue = Online Virtual <br><br>
                                Date = <?php echo $row['deadline']; ?> <br><br>
                                TrainingFee = <?php echo $row['price']; ?> <br><br>



                                <input type="hidden" name="hParticipantID" id="hParticipantID" value="175436">
                                <input type="hidden" name="hTrainingID" id="hTrainingID" value="96124">
                                <input type="hidden" name="hTrainingName" id="hTrainingName" value="Exclusive Session on TDS &amp; VDS (TAX &amp; VAT Deduction at Source)">
                                <input type="hidden" name="hVenue" id="hVenue" value="Online Virtual">
                                <input type="hidden" name="hDate" id="hDate" value="12/25/2020">
                                <input type="hidden" name="hTrainingFee" id="hTrainingFee" value="1000">

                            </td>
                        </tr>
                        <tr align="">
                            <td align="">

                                <!--   <div class="workshopDesc">Please pay online or pay the registration fee by the last date at our office.</div> -->
                                <p>

                                    Please pay the registration fee via online anyday or in our office by the last date.<br>
                                    <br>Please note that, this is an auto generated email, your seats are not confirmed unless you are paid<br>

                                </p>

                                <div align="center">
                                    <br>


                                    <br>

                                </div>


                                <button type="button" class="btn green-btn" onclick="SubmitFunction();"> <i class="icon-payment"></i> Pay Online and get 10% discount </button>



                                <br>
                                <div class="workshopDesc">
                                    <br><br><strong>Bdjobs.com Ltd. or Bdjobs Training
                                    </strong><br> 19th Floor <br>
                                    BDBL Building (Old BSRS)<br>
                                    12 Karwan Bazaar<br>
                                    Dhaka - 1215 <br>01847213994
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <script type="text/javascript">
                function SubmitFunction() {
                    document.getElementById('form1').submit();
                }
            </script>
        </div>

        <div class="footer">
            <div class="row" style="padding: 30px;">



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <h5 id="head">About Us</h5>
                    <div class="footer-font-color">
                        <a href="">About Bdjobs.com</a><br>
                        <a href="">Terms & Condition</a><br>
                        <a href="">International Partners</a><br>
                        <a href="">Other Partners</a><br>
                        <a href="">Facebook</a>
                        <a href="">Contact Us</a>
                    </div>


                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <h5 id="head">Job Seeekers</h5>
                    <div class="footer-font-color">
                        <a href="">Create Accounnt</a><br>
                        <a href="">Career Counseling</a><br>
                        <a href="">My Bdjobs</a><br>
                        <a href="">FAQ</a><br>
                        <a href="">Video Guides</a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <h5 id="head">Employers</h5>
                    <div class="footer-font-color">
                        <a href="">Create Accounnt</a><br>
                        <a href="">Oroducts/Service</a><br>
                        <a href="">Post a Job</a><br>
                        <a href="">FAQ</a><br>
                        <a href="" id="head"><b>Downlod Employer App</b></a>
                        <div>
                            <a href="#"><img src="logo/google.png" alt="Cinque Terre" width="150px" height="58px"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                    <div class=contact-align>
                        <h5 id="head">Tools & Social Media</h5>
                        <div class="footer-font-color">
                            <div class="tools">
                                <i class="fa fa-android" aria-hidden="true"></i>


                                <a href="">Bdjobs Android App</a><br>
                            </div>
                            <div class="tools">
                                <i class="fa fa-apple" aria-hidden="true"></i>

                                <a href="">Bdjobs IOS App</a><br>
                            </div>
                            <div class="tools">
                                <i class="fa fa-facebook" aria-hidden="true"></i>

                                <a href="">Facebook</a><br>
                            </div>
                            <div class="tools">
                                <i class="fa fa-google" aria-hidden="true"></i>

                                <a href="">Google</a><br>
                            </div>
                            <div class="tools">
                                <i class="fa fa-youtube" aria-hidden="true"></i>

                                <a href="">Youtube</a><br>
                            </div>
                            <a href="" id="head"><b>Downlod Mobile App</b></a> <br>
                            <div>
                                <a href="#"><img src="logo/google.png" alt="Cinque Terre" width="150px" height="58px"></a>
                            </div>

                            <div>
                                <a href="#" style="margin-left: 10px;"><img src="logo/appple2.png" alt="Cinque Terre" width="130px" height="40px"></a>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="footer-line">

                        Need any support ? Call to <span> <i class="fa fa-phone" aria-hidden="true"></i>
                            16479 </span>


                    </div>
                </div>

            </div>


        </div>



    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>