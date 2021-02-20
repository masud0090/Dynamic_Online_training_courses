<div class="section-one-nav ">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="" href="#">
            <img src="images/menu.png" width="40px" height="30px" alt="">
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
            <div class="btn1">
                <a class="btn btn-primary" href="signup.php" role="button">SIGN UP</a>
            </div>
        </div>

        <!-- jjjjjjjjj -->
        <!-- <div> -->



        <div class="btnn2" style=" position: absolute; right: 140px;">

            <?php
            //  session_start();

            // //check if session exists?
            if (isset($_SESSION['login_user_id'])) {
            ?>


                <div class="dropdown" style="padding: 5px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php



                        echo "Welcome " . $_SESSION['login_user_name'];










                        ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="mycourse.php">My course</a>
                        <a class="dropdown-item" href="#">Message</a>
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

                                <div class="ulc-container" style="padding: 20px;min-width: 240px;">

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
                                    <br><br>

                                    <a class="for-pass" href="enter_email.php" target="" onclick="">Forgot password?</a>
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
            <a href="mainindex.php"><img src="images/biglogo.png" /></a>

        </div>


    </div>




    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


        <div class="wrap">
            <div class="search">
                <form action="searchcourse.php" style="width: 100%;display:flex" id="btn5" method="post">

                    <input type="text" name="query" class="searchTerm" placeholder="What are you looking for?" required />
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>

                </form>



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
            <?php
            $query7 = "select * from categories ";
            $res7 = mysqli_query($con, $query7);
            while ($rows7 = mysqli_fetch_array($res7)) {
            ?>
                <a style="color: inherit;" class="sidenav-a" target="blank" href="categories_list.php?category=<?php echo $rows7['categories_id']; ?>"><?php echo $rows7['categories_name']; ?></a>

            <?php
            }
            ?>

            <!-- <a style="color: inherit;" target="blank" href="administration.php">Administration</a>
        <a style="color: inherit;" target="blank" href="development.php">Development</a>
        <a style="color: inherit;" target="blank" href="it.php">IT</a>
        <a style="color: inherit;" href="other.php">Other</a> -->
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