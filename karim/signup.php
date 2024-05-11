<?php
session_start();
$title = "Hotel | Sign up";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
if (isset($_POST["signup"])) {
    if (store_guest($_POST["name"], $_POST["email"], $_POST["password"])) {
        $_SESSION['guest_email'] = $_POST['email'];
        if (isset($_SESSION['room_id']))
            header('Location: book.php');
        else
            header('Location: index.php');
        exit();
    } else
        echo "<span style='color: red;'>This email is taken.</span> <a href='login.php'>Log in?</a>";
}
?>
    <main>
        <form action="signup.php" method="post" class="signup">
            <div>
                <label for="name">Name: </label><input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Email: </label><input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password: </label><input type="password" name="password" id="password">
            </div>
            <div>
                <button type="submit" name="signup">Sign up</button>
            </div>
        </form>
        <form action="login.php" method="get">
            <button type="submit">Log in</button>
        </form>
    </main>

<?php
require "partials/footer.php";
