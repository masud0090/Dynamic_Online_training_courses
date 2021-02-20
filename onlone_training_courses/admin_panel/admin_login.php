<?php
// Database connection
include("database_connection.php");
session_start();

if (isset($_POST['submit'])) {
    // username and password sent from form 


    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];


    $sql = "SELECT user_id FROM admin WHERE user_name = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        //  session_register("myusername");
        $_SESSION['admin_user_name'] = $myusername;


        header("location: index.php");
    } else {
        echo ("<script language='javascript'>
      window.alert('Your User name and Password is invalid ...');
       window.location.href='admin_login.php?';</script>");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php';
    ?>
</head>

<body>

    <div class="containerr">


        <div class="login">


            <!-- <div class="dropdown-menu stop-propagation"> -->
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">

                    <div class="content" style="background-color: #f7f7f7;">

                        <div class="center" style="width: 80%; align-items:center; padding:40px;margin:20px 40px;">
                            <center style="font-size:50px">Sign In</center>

                            <form action="" class="md" method="post" id="loginform">
                                <input name="username" id="userNameTextBox" class="form-control" placeholder="Username" type="text">
                                <span id="userNamSpan"></span>
                                <br>
                                <input id="passwordTextBox" name="password" class="form-control" placeholder="Password" type="password">
                                <td><span id="passwordSpan"></span></td>
                                <br>
                                <input class="btn btn-success" href="main_body?tid=<?php echo $rows['id']; ?>" data-toggle="tooltip" data-placement="bottom" id="submitButton" title="" value="Sign In" name="submit" type="submit">
                                <span id=" messageSpan"></span>
                                <!-- <img id="loadingImg" src="demo_wait.gif" /> -->

                                <!-- <a class="for-pass" href="" target="" onclick="">Forgot password?</a> -->



                                <!--Reference to jQuery-->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

                                <!--Reference to Bootstrap core JavaScript-->
                                <script src="bootstrap.js"></script>



                                <script type="text/javascript">
                                    $(document).ready(function() {

                                        $(document).ajaxStart(function() {
                                            $("#loadingImg").show();
                                        });

                                        $(document).ajaxStop(function() {
                                            $("#loadingImg").hide();
                                        });

                                        $("#submitButton").click(function(e) {
                                            if ($("#userNameTextBox").val() == "")
                                                $("#userNamSpan").text("Enter Username");
                                            else
                                                $("#userNamSpan").text("");

                                            if ($("#passwordTextBox").val() == "")
                                                $("#passwordSpan").text("Enter Password");
                                            else
                                                $("#passwordSpan").text("");

                                            if (($("#userNameTextBox").val() != "") && ($("#passwordTextBox").val() != ""))
                                                $.ajax({
                                                    type: "POST",
                                                    url: "/",
                                                    contentType: "application/json; charset=utf-8",
                                                    data: '{"username":"' + $("#userNameTextBox").val() + '","password":"' + $("#passwordTextBox").val() + '"}',
                                                    dataType: "json",
                                                    success: function(result, status, xhr) {
                                                        if (result.d == "Success") {
                                                            $("#messageSpan").text("Login Successful, Redireting to your profile page.");
                                                            setTimeout(function() {
                                                                window.location = "profile.aspx";
                                                            }, 2000);
                                                        } else
                                                            $("#messageSpan").text("Login failed, Please try again.");
                                                    },
                                                    error: function(xhr, status, error) {
                                                        $("#dbData").html("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
                                                    }
                                                });
                                        });

                                    });
                                </script>

                        </div>

                        </form>

                        <hr>
                    </div>

                </div>
                <div class="col-md-3">
                </div>
            </div>
            <!-- </div> -->
        </div>




    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>