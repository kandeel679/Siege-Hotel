<?php
session_start();
$title = "Hotel | Login";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
if (isset($_POST["signup"])) {
    header("location: signup.php");
    exit();
}
if (isset($_POST["login"])) {
    $login = login($_POST['email'], $_POST['password']);
    switch ($login) {
        case 0:
            echo '<p>Email not registered. <a href="signup.php">Register?</a></p>';
            break;
        case 1:
            echo '<p>Incorrect password</p>';
            break;
        case 2:
            $_SESSION['guest_email'] = $_POST['email'];
            if (isset($_SESSION['room_id']))
                header('Location: book.php');
            else
                header('Location: index.php');
            exit();
    }
}
?>
    <main>
        <form action="login.php" method="post" class="login">
            <div>
                <label for="email">Email: </label> <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password: </label> <input type="password" name="password" id="password">
            </div>
            <button type="submit" name="login">Log in</button>
        </form>
        <form action="signup.php" method="post">
            <button type="submit" name="create_account">Create New Account</button>
        </form>
    </main>
<?php
require "partials/footer.php";
