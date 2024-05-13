<?php $title = "Hotel";
require_once "database.php";

session_start();
if (isset($_POST['room_id'])) {
    $_SESSION['room_id'] = $_POST['room_id'];
    if (isset($_SESSION['guest_email']))
        header('Location: booking.php');
    else
        header('Location: LoginPage.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="../assets/chess-rook.602x1024.ico">


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Web Design Mastery | Rayal Park</title>
</head>

<body>
    <!-- Start [Header]  -->
    <header class="header2">
        <nav>
            <div class="nav__bar">
                <div class="logo">
                    <a href="index.php"><img src="../assets/logoo.png" alt="logo" /></a>
                </div>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
            <ul class="nav__links nav-2" id="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="btns-cont">
                 
                <?php
                if (isset($_SESSION["guest_email"]))
                    echo '<a href="Logout.php">
                <button class="btn-link-white nav__btn">Logout</button>
                </a>';
                else
                echo '<a href="LoginPage.php">
                        <button class="btn-link-white nav__btn">Login</button>
                        </a>';
                ?>
                <i class="bx bx-lock-alt"></i>
               
                <!-- https://www.booking.com/hotel/eg/mnzl-mstf-l-wm.en-gb.html?aid=356980&label=gog235jc-1FCAsoQ0IMZ3JhbmQtcGFsYWNlSDNYA2hDiAEBmAEJuAEXyAEM2AEB6AEB-AEMiAIBqAIDuAK4_8mxBsACAdICJDBlMTVhYTljLWZkZTItNDAyZi1iOGU2LWJkNzcwNzdiMmNiMtgCBuACAQ&sid=b2469a1ca26e956b9dd4ffc26671cb9a&dest_id=-291544;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=15;hpos=15;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1714586301;srpvid=09ae7e48f5b200ee;type=total;ucfs=1& -->
            </div>
        </nav>
    </header>
    <!-- End [Header]  -->
    <!-- <section class="section__container booking__container">
  <div class="booking__form">
    <button class="btn nav__btn">Check Rooms</button>
  </div>
</section> -->


    <section id="rooms" class="section__container room__container">
        <p id="Booked_rooms" class="section__subheader">DISCOVER OUR LIVING ROOM COLLECTION.</p>
        <!-- <h2 class="section__header">The Most Memorable Rest Time Starts Here.</h2> -->
        <div id="#home" class="room__grid">
            <?php
            $rooms = get_rooms();
            $roomImgs = ["../assets/room-1.jpg", "../assets/room-2.jpg", "../assets/room-3.jpg"];
            $i = 0;
            foreach ($rooms as $index => $room):
                $imgIndex = $index % count($roomImgs); // Ensure index is within range of $roomImgs
                ?>

                <div class="room__card">
                    <div class="room__card__image">
                        <img src="<?= $room['imgurl'] ?>" alt="room" />
                        <div class="room__card__icons">
                            <span><i class="ri-heart-fill"></i></span>
                            <span><i class="ri-paint-fill"></i></span>
                            <span><i class="ri-shield-star-line"></i></span>
                        </div>
                    </div>
                    <div class="room__card__details">
                        <h4><?= $room['name'] ?></h4>
                        <p><?= $room['description'] ?></p>
                        <h5>Starting from <span>$<?= $room['price'] ?></span></h5>
                        <form action="index.php" method="post">
                            <button class="btn" name="room_id" value="<?= $room['room_id'] ?>">Book Now</button>
                        </form>
                    </div>
                </div>
                
                <?php $i++ ?>
                <?php endforeach ?>
            </div>
            <!-- <div class='container'>
                <a href="view_more.php"><button class="btn-link">View more</button></a>
            </div> -->
    </section>
    <!-- end of the rooms sectoin -->





    <footer class="footer" id="contact">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="logo">
                    <a href="#home"><img src="../assets/logoo.png" alt="logo" /></a>
                </div>
                <p class="section__description">
                    Discover a world of comfort, luxury, and adventure as you explore
                    our curated selection of hotels, making every moment of your getaway
                    truly extraordinary.
                </p>
                <a target = "_blanck" href="https://www.booking.com/hotel/eg/mnzl-mstf-l-wm.en-gb.html?aid=356980&label=gog235jc-1FCAsoQ0IMZ3JhbmQtcGFsYWNlSDNYA2hDiAEBmAEJuAEXyAEM2AEB6AEB-AEMiAIBqAIDuAK4_8mxBsACAdICJDBlMTVhYTljLWZkZTItNDAyZi1iOGU2LWJkNzcwNzdiMmNiMtgCBuACAQ&sid=b2469a1ca26e956b9dd4ffc26671cb9a&dest_id=-291544;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=15;hpos=15;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1714586301;srpvid=09ae7e48f5b200ee;type=total;ucfs=1&"><button class="btn">Book Now</button></a>
            </div>
            <div class="footer__col">
                <h4>QUICK LINKS</h4>
               
            </div>
            <div class="footer__col">
                <h4>OUR SERVICES</h4>
              
            </div>
            <div class="footer__col">
                <h4>CONTACT US</h4>
                <ul class="footer__links">
                    <li><a href="mailto:SiegeHotel@gmail.com.com">SiegeHotel@gmail.com.com</a></li>
                </ul>
                <div class="footer__socials">
                    <a target="_blank" href="https://www.facebook.com/"><img src="../assets/facebook.png"
                            alt="facebook" /></a>
                    <a target="_blank" href="https://www.instagram.com/"><img src="../assets/instagram.png"
                            alt="instagram" /></a>
                    <a target="_blank" href="https://www.youtube.com/"><img src="../assets/youtube.png"
                            alt="youtube" /></a>
                    <a target="_blank" href="https://www.twitter.com/"><img src="../assets/twitter.png"
                            alt="twitter" /></a>
                </div>
            </div>
        </div>
        <div class="footer__bar">
            Web Programming (CCS2305)@2024
        </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
     <script src="./js/main.js"></script>
</body>

</html>