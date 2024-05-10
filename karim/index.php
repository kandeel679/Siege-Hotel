<?php
session_start();
if (isset($_POST['room_id'])) {
    $_SESSION['room_id'] = $_POST['room_id'];
    if (isset($_SESSION['guest_email']))
        header('Location: book.php');
    else
        header('Location: login.php');
    exit();
}
$title = "Hotel";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
?>
    <main>
        <div class="about-us">
            <video src="assets/egypt.mp4" controls autoplay loop></video>
            <h1>About Us</h1>
            <p style="padding: 16px;">
                We are a hotel located in the heart of Cairo. We are known for exceptional service and luxurious rooms.
                We have been in business for over 20 years and have served thousands of customers.
                Our hotels are perfect for both business and leisure travelers. We offer a
                variety of amenities including free Wi-Fi, room service, and a fitness center.
                Our staff is friendly and professional and will go above and beyond to make sure your stay is perfect.
                We look forward to welcoming you to our hotel!
            </p>
        </div>
        <div class="rooms" id="rooms">
            <h1>Rooms</h1>
            <?php $rooms = get_rooms();
            foreach ($rooms as $room):?>
                <div class="room">
                    <img src="./assets/room-<?= $room['room_id'] ?>.jpg" alt="Room"/>
                    <h2><?= $room['name'] ?>
                    </h2>
                    <p><?= $room['description'] ?>
                    </p>
                    <div style="display:inline-block;">
                        <b>Price: </b> EGP <?= $room['price'] ?>/night
                        <b>Capacity: </b> <?= $room['capacity'] ?> person(s)
                    </div>
                    <form action="index.php" method="post">
                        <button type="submit" name="room_id" value="<?= $room['room_id'] ?>">Book</button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </main>
<?php require "partials/footer.php"; ?>