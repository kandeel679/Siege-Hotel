<?php
$title = "Hotel | Sign up";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $guest_id = null;
    try {
        $guest_id = store_guest($_POST["name"], $_POST["email"], $_POST["password"]);
    } catch (mysqli_sql_exception $e) {
        echo "<span style='color: red;'>This email is taken.</span>";
    }
    if ($guest_id) {
        setcookie("guest_id", $guest_id, time() + (86488 * 2), "/");
        setcookie("logged", true, time() + (86488 * 2), "/");
        header("Location: ./index2.php");
    }
}
?>
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

<?php
require "partials/footer.php";
