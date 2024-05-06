<?php
$title = "Hotel | Sign up";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";

if (isset($_POST["pay"])) {
    $guest_id = null;
    try {
        store_booking($_POST["name"], $_POST["email"], $_POST["password"]);
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

<?php
require "partials/footer.php";
