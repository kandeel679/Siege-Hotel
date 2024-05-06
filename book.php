<?php
$title = "Hotel | Book:";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
if (!$_COOKIE['logged_in']) {
    header("Location: login.php");
}
?>
<?php $room = get_room($_GET['room_id']); ?>
    <div class="room">
        <img src="./assets/room<?= $room['room_id'] ?>.jpg" alt="Room"/>
        <h2><?= $room['name'] ?>
        </h2>
        <p><?= $room['description'] ?>
        </p>
        <div style="display:inline-block;">
            <b>Price: </b> EGP <?= $room['price'] ?>/night
            <b>Capacity: </b> <?= $room['capacity'] ?> person(s)
        </div>
        <form action="book.php" method="get">
            <button type="submit" name="room_id" value="<?= $room['room_id'] ?>"><h2>Book</h2></button>
        </form>
    </div>

<?php
require "partials/footer.php";
