<?php
session_start();
$title = "Hotel | Sign up";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
if (!isset($_SESSION['guest_email'])) {
    header("Location: login.php");
    exit();
}
?>
    <main>
        <div class="account-info">
            <h1>Account Information</h1>
            <?php $guest = get_guest($_SESSION['guest_email']); ?>
            <p><b>Name: </b><?= $guest['name'] ?></p>
            <p><b>Email: </b><?= $guest['email'] ?></b></p>
        </div>
        <div class="bookings">
            <h1>Bookings</h1>
            <?php
            $bookings = get_bookings($_SESSION['guest_email']);
            foreach ($bookings as $booking):
                $room = get_room($booking['room_id']);
                ?>
                <div class="booking">
                    <img src="./assets/room-<?= $room['room_id'] ?>.jpg" alt="Room"/>
                    <h2><?= $room['name'] ?>
                    </h2>
                    <p><b>Check-in: </b> <?= $booking['check_in'] ?></p>
                    <p><b>Check-out: </b> <?= $booking['check_out'] ?></p>
                    <p><b>Price: </b> EGP<?= $booking['price'] ?></p>

                </div>
            <?php endforeach; ?>
        </div>
    </main>
<?php
require "partials/footer.php";
