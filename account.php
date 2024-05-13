<?php $title = "Hotel";
session_start();

require_once "database.php";
$error_msg = '';
if (!isset($_SESSION['guest_email'])) {
    header("Location: LoginPage.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="./css/booking.css" />
    <link type="text/css" rel="stylesheet" href="./css/styles.css" />
</head>

<body>
    <?php 
        $user = get_guest($_SESSION['guest_email'])
        ?>
  <div id="booking" class="section">
      <div class="section-center">
            <a href="index.php"><button class="btn-black z-3" name="confirm_booking"><</button></a>
            <div class="container">
                
                    <div class="col-md-10 col-md-offset-1">
                        <div class="booking-form">
                            <div class="row">
                            </div>
                                <div class="row t-">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Name:<b><?= "      \t".$user['name']?></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Email:   <b><?= "      \t".$user['email']?></b>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-btn mb-10">
                                    <a href="index.php"><button class="submit-btn" name="confirm_booking">Back</button></a>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div> 
     <section id="rooms" class="section__container room__container">
        <p id="Booked_rooms" class="section__subheader">Booked rooms</p>
        <div class="room__grid">
            <?php
            $bookings = get_bookings($_SESSION['guest_email']);
            $roomImgs = ["assets/room-1.jpg", "assets/room-2.jpg", "assets/room-3.jpg"];
            foreach ($bookings as $index => $booking):
                $imgIndex = $index % count($roomImgs);
              $room = get_room($booking['room_id']);
              
                ?>

                <div class="room__card">
                    <div class="room__card__image">
                        <img src="<?= $roomImgs[$imgIndex] ?>" alt="room" />
                        <div class="room__card__icons">
                            <span><i class="ri-heart-fill"></i></span>
                            <span><i class="ri-paint-fill"></i></span>
                            <span><i class="ri-shield-star-line"></i></span>
                        </div>
                    </div>
                    <div class="room__card__details">
                        <h4><?= $room['name'] ?></h4>
                        <p><?= $room['description'] ?></p>
                        <h5>Price <span>$<?= $room['price'] ?></span></h5>
                        <h5>Check-in:  <span><?= $booking['check_in'] ?></span></h5>
                        <h5> Check-out:  <span><?= $booking['check_out'] ?></span></h5>
                    </div>
                </div>
                
            <?php endforeach ?>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script>

    </script>

</body>

</html>