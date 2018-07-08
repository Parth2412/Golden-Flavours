<?php
include '../admin/class/at-class.php';
user_login_auth();

$login_details = get_results("select * from tbl_user where user_id='{$_SESSION['userlogin_id']}'");

if (isset($_POST['submit'])) {
    
    $opass = $_POST['OldPassword'];
    $npass = $_POST['NewPassword'];
    $cpass = $_POST['ConfirmPassword'];
    
    if($login_details['user_password']==$opass)
    {
        if($npass==$cpass)
        {
             if($npass==$login_details['user_password'])
             {
                redirect("?success=2&msg=You have used old password as a new password please choose another.");
             }
             else
             {
                bindupdate("tbl_user", array("user_password"=>$npass), "user_id='{$_SESSION['userlogin_id']}'");
                echo "<script>alert('Your password has been changed successfully')</script>";
                redirect("index.php");
             }
        }
        else
        {
             redirect("?success=2&msg=Confirm Password Not Match");
        }
    }
    else 
    {
            redirect("?success=2&msg=Old Password Not Matched");
    }
}

$insert_array=array(
    "category_name" =>$_POST['category_name']
);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Golden Flavours</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="login-style/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="login-style/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="login-style/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login-style/css/util.css">
        <link rel="stylesheet" type="text/css" href="login-style/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>


        <div class="container-login100" style="background-image: url('login-style/images/bg-04.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title p-b-37">
                        Change Password
                    </span>

                    <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Old Password">
                        <input class="input100" type="password" name="OldPassword" placeholder="Old Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter  New Password">
                        <input class="input100" type="password" name="NewPassword" placeholder="New Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter Confirm Password">
                        <input class="input100" type="password" name="ConfirmPassword" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="submit">
                            Confirm
                        </button>
                    </div>




                </form>


            </div>
        </div>



        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="login-style/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="login-style/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="login-style/vendor/bootstrap/js/popper.js"></script>
        <script src="login-style/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="login-style/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="login-style/vendor/daterangepicker/moment.min.js"></script>
        <script src="login-style/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="login-style/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="login-style/js/main.js"></script>

    </body>
</html>