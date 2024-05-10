<?php
session_start();
$title = "Hotel | Book:";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
if (!isset($_SESSION["guest_email"])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['confirm_booking'])) {
    if ($_POST['check_in'] == $_POST['check_out'])
        echo "<p style='color: red;'>Check-in and check-out dates cannot be the same</p><br>";
    else {
        store_booking($_SESSION['guest_email'], $_SESSION['room_id'], $_POST['check_in'], $_POST['check_out']);
        $_SESSION["room_id"] = null;
        header("Location: account.php");
        exit();
    }
}

?>
<?php $room = get_room($_SESSION['room_id']); ?>
    <main>
        <div class="room">
            <img src="./assets/room-<?= $_SESSION['room_id'] ?>.jpg" alt="Room"/>
            <h2><?= $room['name'] ?>
            </h2>
            <p><?= $room['description'] ?>
            </p>
            <div style="display:inline-block;">
                <b>Price: </b> EGP<?= $room['price'] ?>/night
                <b>Capacity: </b> <?= $room['capacity'] ?> person(s)
            </div>
        </div>
        <form action="book.php" method="post" class="book">
            <label for="check_in">Check-in: </label>
            <input type="date" name="check_in" id="check_in"
                   min="<?= date("Y-m-d") ?>" required>
            <label for="check_out">Check-out: </label>
            <input type="date" name="check_out" id="check_out"
                   min="<?= date("Y-m-d") ?>" required>
            <button type="submit" name="confirm_booking">Confirm Booking</button>
        </form>
    </main>
<?php
require "partials/footer.php";
