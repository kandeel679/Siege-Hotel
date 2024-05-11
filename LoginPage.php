<?php session_start(); ?>

<?php
require 'database.php';
$error_message = '';
if (isset($_POST["signup"])) {
    if (store_guest($_POST["name"], $_POST["email"], $_POST["password"])) {
        $_SESSION['guest_email'] = $_POST['email'];
        if (isset($_SESSION['room_id']))
            header('Location: booking.php');
        else
            header('Location: index.php');
        exit();
    } else {
        // Email is taken
        $error_message = "This email is already taken. <a href='login.php'>Log in?</a>";
    }
}

if (isset($_POST["login"])) {
    $login = login($_POST['email'], $_POST['password']);
    switch ($login) {
        case 0:
            // Email not registered
            $error_message = "Email not registered. <a href='signup.php'>Register?</a>";
            break;
        case 1:
            // Incorrect password
            $error_message = "Incorrect password";
            break;
        case 2:
            $_SESSION['guest_email'] = $_POST['email'];
            if (isset($_SESSION['room_id']))
            header('Location: booking.php');
        else
        // echo $_SESSION['guest_email'] ; 
                header('Location: index.php');
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/assets/chess-rook.602x1024.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/Login_styles.css">
    <title>Ludiflex | Login & Registration</title>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>Siege Hotel </p>
            </div>

            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
                <button class="btn " id="registerBtn" onclick="register()">Sign Up</button>
                <a href="index.php">
                    <button class="btn">Home</button>
                </a>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>
        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- login form -------------------------->
            <form action="LoginPage.php" method="post" class="login-container" id="login">

                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Register</a></span>
                    <header>Login</header>
                </div>
                <?php
                            if (isset($error_message) && !empty($error_message) && ($error_message[0] == "E" || $error_message[0] == "I" || $error_message[0] == "T")) {
                                echo '<div style="color: red; text-align: center;">
                                    <p>' . $error_message . '</p>
                                </div>';
                            } 
                            ?>



                <div class="input-box">
                    <input type="email" name="email" id="email" class="input-field" placeholder="Email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit"  name="login" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
            <!------------------- registration form -------------------------->

            <form action="LoginPage.php" method="post" class="register-container" id="register">
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    <header>Register</header>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" class="input-field" name="email" placeholder="Email"
                        required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="name" id="name" type="text" class="input-field" name="name"
                        placeholder="Name" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" type="password" class="input-field"
                        name="password" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <button type="submit" name="signup" type="submit" class="submit" value="Sign up"> Sign up</button>
                </div>
                <div class="two-col">
                    <div class="one">
                        <!--                            <input type="checkbox" id="register-check">-->
                        <!--                            <label for="register-check"> Remember Me</label>-->
                    </div>
                    <div class="two">
                        <label><a href="#">Terms & conditions</a></label>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script>

        function myMenuFunction() {
            var i = document.getElementById("navMenu");
            if (i.className === "nav-menu") {
                i.className += " responsive";
            } else {
                i.className = "nav-menu";
            }
        }

    </script>
    <script>
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className += " white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }

        function register() {
            x.style.left = "-510px";
            y.style.right = "5px";
            a.className = "btn";
            b.className += " white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
    </script>
</body>

</html>