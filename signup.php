<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
    <script defer>
        function callErr(errorNo) {
            console.log("Call error has been called");
            switch (errorNo) {
                case 1: usernameErr();
                        break;

                case 2: pwdErr();
                        break;

                case 3: techErr();
                        break;
            }
        }

        function techErr() {
            let errorMsgArea = document.getElementsByClassName("common-error")[0];
            errorMsgArea.innerHTML = "Some error occured. Please try again later."; 
        }   

        function usernameErr() {
            let usrnamArea = document.getElementsByClassName("username-error")[0];
            usrnamArea.innerHTML = "Username already taken";
        }

        function usernameMistake() {
            let usrnamArea = document.getElementsByClassName("username-error")[0];
            usrnamArea.innerHTML = "Use only letters and underscores for username";
        }

        function pwdErr() {
            let pwdArea = document.getElementsByClassName("repeat-pwd-error")[0];
            pwdArea.innerHTML = "The two passwords do not match";
        }

        function loginSuccess() {
            window.location.replace("index.html");
        }
    </script>
</head>
<body>
    <?php
        if (isset($_POST["sign_up"])) {
            $fname = $_POST["f_name"]; 
            $lname = $_POST["l_name"];
            $username = $_POST["username"];
            $passone = $_POST["pass_one"];
            $passtwo = $_POST["pass_two"];
        } else {
            $fname = $lname = $username = $passone = $passtwo = "";
        }


        // $lname = $username = $passone = $passtwo = "";
    ?>

    <div class="container">
        <div class="left-area">
            <div class="greeting-area">
                Welcome to <br>
                <spanc class="checkmate">CheckMate</span>.
            </div>
        </div>
        <div class="right-area">
            <div class="form-area">
                <form action="" method="post" onsubmit="">
                    <div class="flex-line line" style="display: flex;">
                        <div class="fname">
                            FIRST NAME: <br>
                            <input type="text" name="f_name" id="" value = "<?php echo $fname; ?>" required>
                        </div>
                        <div class="lname">
                            LAST NAME: <br>
                            <input type="text" name="l_name" id=""  value = "<?php echo $lname; ?>" required>
                        </div>
                    </div>

                    <div class="line">
                        USERNAME: <br>
                        <input type="text" name="username" value = "<?php echo $username; ?>" required>
                    </div>

                    <div class="line username-error">
                        <!-- User-name-error -->
                    </div>

                    <div class="line">
                        PASSWORD: <br>
                        <input type="password" name="pass_one" value = "<?php echo $passone; ?>"  required>
                    </div>

                    <div class="line pwd-error">
                        <!-- Pwd error -->
                    </div>

                    <div class="line">
                        REPEAT PASSWORD: <br>
                        <input type="password" name="pass_two" value = "<?php echo $passtwo; ?>" required>
                    </div>

                    <div class="line repeat-pwd-error">
                        <!-- Password doesn't match -->
                    </div>
                    
                    <div class="flex-line line">
                        <!-- <input type="submit" value="Login" name="login"> -->
                        <input type="submit" value="SIGN UP" name="sign_up" id="signupBtn">
                    </div>

                    <div class="line" style="text-align: center;">
                        Already have an account? <a href="login.php">Login</a>
                    </div>

                    <div class="line common-error">
                        <!-- common error -->
                    </div>

                    
                </form>
            </div>
        </div>
    </div>

    <?php
        echo "It reached inside php";
        if(isset($_POST["sign_up"])) {
            include "connect.php";
            // include "calling_js_fun.php";

            //username checking
            $username_query = "select * from user_details where username='$username'";
            $username_res = mysqli_query($con, $username_query); //result is an associative array
            
            try {
                $row = mysqli_fetch_assoc($username_res);
                if ($row != NULL) {
                    if ($row["username"] != NULL) {
                        die("<script>callErr(1);</script>");
                    }
                }
                
            } catch (Exception $e) {}

            //password checking
            if ($passone != $passtwo) {
                die("<script>callErr(2);</script>");
            }

            die("<script>loginSuccess();</script>");

            /* Write code for username mistake function */

            // call_tech_err(3);

            // echo "<script>callErr(3);</script>";
        }
    ?>

    

    <!-- <script>
        let signupBtn = document.getElementById("signupBtn");

        signupBtn.addEventListener("submit", e => {
            e.preventDefault();
        });
    </script> -->

    

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</body>
</html>