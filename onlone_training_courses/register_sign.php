<?php

// Database connection
include("admin_panel/database_connection.php");
session_start();
$id = $_GET['tid'];

//$sql= "select * FROM course WHERE id='$id'";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <link rel="stylesheet" href="styles.css" />
  <title>Document</title>

  <script>
    // Function to check Whether both passwords 
    // is same or not. 
    function checkPassword(form) {
      password = form.password.value;
      password1 = form.password1.value;

      // If password not entered 
      if (password == '')
        alert("Please enter Password");

      // If confirm password not entered 
      else if (password1 == '')
        alert("Please enter confirm password");

      // If Not same return False.     
      else if (password != password1) {
        alert("\nPassword did not match: Please try again...")
        return false;
      }

      // If same return True. 
      else {
        alert("Password Match: Welcome!")
        return true;
      }
    }
  </script>





</head>

<body>
  <div class="reg-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">


          <div class="mainfild">
            <div class="row">
              <h1>Create your new account</h1>
            </div>
            <hr />
            <form action="register_signup.php" name="registration" method="post" onSubmit="return checkPassword(this)">





              <input type="hidden" name="course_id" value="<?php echo $id; ?>">





              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h4>First Name <span class="rf">*</span></h4>

                    <input class="form-control from-control-login" placeholder="" type="text" name="fname" id="fname" value="" required />
                  </div>

                  <div class="col-md-6">
                    <h4>Last Name</h4>
                    <input type="text" class="form-control from-control-login" placeholder="" name="lname" id="lname" value="" />
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h4>Email Address <span class="rf">*</span></h4>
                    <div <?php if (isset($_GET['error1'])) : ?> <?php endif ?>>
                      <input class="form-control from-control-login" type="email" name="email" placeholder="">
                      <?php if (isset($_GET['error1'])) : ?>
                        <span><?php echo $_GET['error1']; ?></span>
                      <?php endif ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h4>Phone <span class="rf">*</span></h4>
                    <input type="text" class="form-control from-control-login" placeholder="Mobile ..." id="phone" name="phone" value="" required />
                  </div>

                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h4>Area of Interest <span class="rf">*</span></h4>
                    <select name="interest" id="interest" class="form-control from-control-login" required>
                      <?php
                      $query = "select * from categories  ";
                      $res = mysqli_query($con, $query);
                      ?>
                      <?php while ($rows = mysqli_fetch_array($res)) {
                      ?>
                        <option value="<?php echo $rows['categories_id']; ?>"> <?php echo $rows['categories_name']; ?></option>


                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <h4>Gender <span class="rf">*</span></h4>

                    <select required="required" class="form-control from-control-login" id="gender" name="gender" required>
                      <option value="-1" selected="">Select</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h4>Organization</h4>

                    <input type="text" class="form-control" value="" size="60" id="organization" name="organization" />
                  </div>

                  <div class="col-md-6">
                    <h4>Designation</h4>
                    <input type="text" class="form-control" value="" size="60" id="designation" name="designation" />
                  </div>
                </div>
              </div>
              <br />

              <div class="col-md-12">
                <span style="color: green">
                  * Create your own username and password | stay tuned with our
                  services.</span>
                <div class="row">
                  <div class="col-md-6">
                    <h4>Username <span class="rf">*</span></h4>
                    <div <?php if (isset($_GET['error'])) : ?> <?php endif ?>>
                      <input class="form-control from-control-login" type="text" name="username" placeholder="Username">
                      <?php if (isset($_GET['error'])) : ?>
                        <span style="color: red;"><?php echo $_GET['error']; ?></span>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h4>Password <span class="rf">*</span></h4>
                    <input class="form-control from-control-login" placeholder="" id="input" type="password" maxlength="12" name="password" value="" required />

                    <p style="font-size: 13px; font-weight: normal">
                      [Use at least 8 to 12 characters.]<br />
                    </p>
                  </div>

                  <div class="col-md-6">
                    <h4>Confirm Password <span class="rf">*</span></h4>
                    <input class="form-control from-control-login" placeholder="" id="Password" type="password" maxlength="12" name="password1" value="" required />
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <button class="btn btn-success" id="button" type="submit" name="submit" value="Submit" href="">
                  Submit
                </button>

                <div id="overlay">
                  <div class="cv-spinner">
                    <span class="spinner"></span>
                  </div>
                </div>
                <script type="text/javascript" src="loder.js"></script>
              </div>

              <!--/h1-->
            </form>
          </div>
        </div>



        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="mainfild">
            <h2 style="color: #b1097c;font-size: 24px;font-weight: 600;padding: 40px 0px 0px 0px;">
              Already registered at bdjobs.com ?</h2>
            <h4>Sign In</h4>
            <hr>
            <form action="register_signin.php" method="post" id="loginform">
              <input type="hidden" name="course_id" value="<?php echo $id; ?>">

              <h4>Username <span class="rf">*</span></h4>
              <input name="username" id="userNameTextBox" class="form-control" placeholder="Username" type="text">
              <span id="userNamSpan"></span>
              <br>
              <h4>Password <span class="rf">*</span></h4>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>