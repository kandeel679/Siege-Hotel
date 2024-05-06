<?php
$title = "Hotel | Book:";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
if (!$_COOKIE['logged']) {
    header("Location: login.php");
}
?>
<?php $room = mysqli_fetch_assoc(get_room($_GET['room_id'])); ?>
    <main>
        <div class="room">
            <img src="./assets/room<?= $_GET['room_id'] ?>.jpg" alt="Room"/>
            <h2><?= $room['name'] ?>
            </h2>
            <p><?= $room['description'] ?>
            </p>
            <div style="display:inline-block;">
                <b>Price: </b> EGP<?= $room['price'] ?>/night
                <b>Capacity: </b> <?= $room['capacity'] ?> person(s)
            </div>
        </div>
        <form action="account.php" method="post" class="pay">
            <button type="submit" name="pay">Pay</button>
        </form>
    </main>

<?php
require "partials/footer.php";
