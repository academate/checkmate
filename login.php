<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signup.css">
    <script defer>
        function callErr(errorNo) {
            // console.log("Call error has been called");
            switch (errorNo) {
                case 1: userNotExist();
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

        function userNotExist() {
            let commonMsgArea = document.getElementsByClassName("common-error")[0];
            commonMsgArea.innerHTML = "User doesn't exist";
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

        function checkPwdFun(thePwd) {
            let enteredPwd = document.getElementsByName("pass_one")[0].value;
            // console.log(enteredPwd);

            if (enteredPwd == thePwd) {
                loginSuccess();
            } else {
                let pwdArea = document.getElementsByClassName("pwd-error")[0];
                pwdArea.innerHTML = "Entered password is wrong";
            }
        }
    </script>
</head>
<body>
    <?php
        $username = $passone = "";
        if (isset($_POST["login"])) {
            // $fname = $_POST["f_name"]; 
            // $lname = $_POST["l_name"];
            $username = $_POST["username"];
            $passone = $_POST["pass_one"];
            // $passtwo = $_POST["pass_two"];
        }
    ?>

    <div class="container">
        <div class="left-area">
            <div class="greeting-area">
                Welcome back to <br>
                <spanc class="checkmate">CheckMate</span>.
            </div>
        </div>
        <div class="right-area">
            <div class="form-area">
                <form action="" method="post" onsubmit="">
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
                    
                    <div class="flex-line line">
                        <!-- <input type="submit" value="Login" name="login"> -->
                        <input type="submit" value="LOG IN" name="login" id="loginBtn">
                    </div>

                    <div class="line" style="text-align: center;">
                        Don't have an account? <a href="signup.php">Sign up</a>
                    </div>

                    <div class="line common-error">
                        <!-- common error -->
                    </div>

                    
                </form>
            </div>
        </div>
    </div>

    <?php
        // echo "It reached inside php<br>";

        if(isset($_POST["login"])) {
            include "connect.php";
            // include "calling_js_fun.php";

            //username checking
            $username_query = "select * from user_details where username='$username'";
            $username_res = mysqli_query($con, $username_query); //result is an associative array

            // echo "<br><br>" . var_dump($username_res) . "<br><br>";

            try {
                $row = mysqli_fetch_assoc($username_res);
                echo "Row: " . var_dump($row);
                if ($row == NULL) {
                    die("<script>callErr(1);</script>");
                } else {
                    $original_pwd = $row["password"];

                    echo "<script>checkPwdFun('$original_pwd');</script>";
                }
                
            } catch (Exception $e) {}

            //password checking
            // if ($passone != $passtwo) {
            //     die("<script>callErr(2);</script>");
            // }
        }
    ?>
</body>
</html>