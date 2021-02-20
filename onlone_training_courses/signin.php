<?php
// Database connection
include("admin_panel/database_connection.php");
session_start();

if (isset($_POST['submit'])) {
    // username and password sent from form 


    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    //   $names= $_POST['name'];

    $sql = "SELECT id FROM registration WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        //  session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        // $_SESSION['login_user_name']=$names;

        header("location: welcome.php");
    } else {
        echo "Your Login Name or Password is invalid";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <a href="http://www.demo.yogihosting.com/e/bootstrap-modal-login-form/css/style.css"></a>
</head>

<body>

    <div class="container">


        <div class="tsin dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sign In</a>

            <div class="dropdown-menu stop-propagation">
                <div class="row">
                    <div class="col-md-12">

                        <div class="ulc-container">


                            <form action="" method="post" id="loginform">
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

















                            </form>


                            <hr>





                        </div>

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