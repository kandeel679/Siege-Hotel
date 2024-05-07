<?php session_start(); ?>

<?php
require 'database.php';
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    echo "BBB";

    $guest_id = null;
    try {
        $guest_id = store_guest($_POST["name"], $_POST["email"], $_POST["password"]);
    } catch (mysqli_sql_exception $e) {
        echo "<span style='color: red;'>This email is taken.</span>";
    }
    if ($guest_id) {
        setcookie("guest_id", $guest_id, time() + (86488 * 2), "/");
        setcookie("logged", true, time() + (86488 * 2), "/");
        header("Location: ./index.php");
    }
} else if (isset($_POST["email"]) && isset($_POST["password"])) {
    echo "BBB";
    if (Login($_POST["email"], $_POST["password"])) {
        $user = mysqli_fetch_assoc(get_guestByemail($_POST["email"]));
        echo "BBB";
        setcookie("guest_id", $user["guest_id"], time() + (86488 * 2), "/");
        setcookie("logged", true, time() + (86488 * 2), "/");
        header("Location: ./index.php");

    }
    echo "ccc";
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
    <link rel="stylesheet" href="./Login_styles.css">
    <title>Ludiflex | Login & Registration</title>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>LOGO </p>
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
                <div class="input-box">
                    <input type="email" name="email" id="email" class="input-field" placeholder="Email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
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