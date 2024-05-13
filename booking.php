<?php $title = "Hotel";
session_start();

require_once "database.php";
$error_msg = '';
if (!isset($_SESSION["guest_email"])) {
    header("Location: LoginPage.php");
    exit();
}
if (isset($_POST['confirm_booking'])) {
    if ($_POST['check_in'] == $_POST['check_out'])
        $error_msg = "<p style='color: red;'>Check-in and check-out dates cannot be the same</p><br>";
    else {
        store_booking($_SESSION['guest_email'], $_SESSION['room_id'], $_POST['check_in'], $_POST['check_out']);
        $_SESSION["room_id"] = null;
        header("Location: account.php");
        exit();
    }
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
</head>

<body>
    <?php 
        $room = get_room($_SESSION['room_id']);
        $user = get_guest($_SESSION['guest_email'])
    ?>
    <div id="booking" class="section" style='background-image: url(<?= $room['imgurl']?>);' >
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="booking-cta">
                            <h1><?= $room['name']?></h1>
                            <p><?= $room['description']?></p>
                            <p>price: <?= '$'.$room['price']?></p>
                            <p>capacity: <?= $room['capacity']?></p>
                            <a href="index.php"><button class="submit-btn"> Home</button></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <div class="booking-form">
                            <form action="booking.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input readonly  class="form-control " type="text" value="<?= $user['name']?>">
                                            <span class="form-label">Name</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input readonly  class="form-control " type="text" value="<?= $user['email']?>">
                                            <span class="form-label">Email</span>
                                        </div>
                                    </div>
                                </div>
                                        <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="check_in" id="check_in"
                                                     min="<?= date("Y-m-d") ?>" required>
                                            <span class="form-label">Check In</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="check_out" id="check_out"
                                                    min="<?= date("Y-m-d") ?>" required>
                                            <span class="form-label">Check Out</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn" name="confirm_booking">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
        $('.form-control').each(function () {
            floatedLabel($(this));
        });

        $('.form-control').on('input', function () {
            floatedLabel($(this));
        });

        function floatedLabel(input) {
            var $field = input.closest('.form-group');
            if (input.val()) {
                $field.addClass('input-not-empty');
            } else {
                $field.removeClass('input-not-empty');
            }
        }
    </script>

</body>

</html>