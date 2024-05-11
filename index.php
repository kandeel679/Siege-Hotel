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
    <header class="header">
        <nav>
            <div class="nav__bar">
                <div class="logo">
                    <a href="#"><img src="../assets/logoo.png" alt="logo" /></a>
                </div>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
            <ul class="nav__links" id="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#explore">Explore</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="btns-cont">
                 
                <a target="" href="account.php">
                    <button class="btn nav__btn">Account</button>
                </a>
                <?php
                if (isset($_SESSION["guest_email"]))
                    echo '<a href="Logout.php">
                <button class="btn nav__btn">Logout</button>
                </a>';
                else
                echo '<a href="LoginPage.php">
                        <button class="btn nav__btn">Login</button>
                        </a>';
                ?>
                <i class="bx bx-lock-alt"></i>
               
                <!-- https://www.booking.com/hotel/eg/mnzl-mstf-l-wm.en-gb.html?aid=356980&label=gog235jc-1FCAsoQ0IMZ3JhbmQtcGFsYWNlSDNYA2hDiAEBmAEJuAEXyAEM2AEB6AEB-AEMiAIBqAIDuAK4_8mxBsACAdICJDBlMTVhYTljLWZkZTItNDAyZi1iOGU2LWJkNzcwNzdiMmNiMtgCBuACAQ&sid=b2469a1ca26e956b9dd4ffc26671cb9a&dest_id=-291544;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=15;hpos=15;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1714586301;srpvid=09ae7e48f5b200ee;type=total;ucfs=1& -->
            </div>
        </nav>
        <div class="section__container header__container" id="home">
            <p>Simple - Unique - Friendly</p>
            <h1>Make Yourself At Home<br />In Our <span>Hotel</span>.</h1>
        </div>
    </header>
    <!-- End [Header]  -->
    <!-- <section class="section__container booking__container">
  <div class="booking__form">
    <button class="btn nav__btn">Check Rooms</button>
  </div>
</section> -->

    <section class="section__container about__container" id="about">
        <div class="about__image">
            <img src="../assets/about.jpg" alt="about" />
        </div>
        <div class="about__content">
            <p class="section__subheader">ABOUT US</p>
            <h2 class="section__header">Asyut Unveiling Egypt's Hidden Gem</h2>
            <p class="section__description">
                Welcome to Siege Hotel, nestled in the heart of Asyut, Egypt. Our commitment to excellence ensures that
                your
                holiday
                experience surpasses all expectations. From luxurious accommodations to personalized services, we strive
                to
                create
                unforgettable memories for every guest. Discover the perfect blend of comfort and sophistication at
                Siege
                Hotel, where
                your dream holiday begins.
            </p>
            <div class="about__btn">
                <a target="_blank" href="https://en.wikipedia.org/wiki/Asyut">
                    <button class="btn">Read More</button>
                </a>
            </div>
        </div>
    </section>



    <section id="rooms" class="section__container room__container">
        <p class="section__subheader">OUR LIVING ROOM</p>
        <h2 class="section__header">The Most Memorable Rest Time Starts Here.</h2>
        <div class="room__grid">
            <?php
            $rooms = get_rooms();
            $roomImgs = ["../assets/room-1.jpg", "../assets/room-2.jpg", "../assets/room-3.jpg"];
            $i = 0;
            foreach ($rooms as $index => $room):
                $imgIndex = $index % count($roomImgs); // Ensure index is within range of $roomImgs
                if($i>=3){
                    break;
                }
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
                        <h5>Starting from <span>$<?= $room['price'] ?></span></h5>
                        <form action="index.php" method="post">
                            <button class="btn" name="room_id" value="<?= $room['room_id'] ?>">Book Now</button>
                        </form>
                    </div>
                </div>
                
            <?php $i++ ?>
            <?php endforeach ?>
        </div>
    </section>
    <!-- end of the rooms sectoin -->
    <section class="service" id="service">
        <div class="section__container service__container">
            <div class="service__content">
                <p class="section__subheader">SERVICES</p>
                <h2 class="section__header">Strive Only For The Best.</h2>
                <ul class="service__list">
                    <li>
                        <span><i class="ri-shield-star-line"></i></span>
                        High Class Security
                    </li>
                    <li>
                        <span><i class="ri-24-hours-line"></i></span>
                        24 Hours Room Service
                    </li>
                    <li>
                        <span><i class="ri-headphone-line"></i></span>
                        Conference Room
                    </li>
                    <li>
                        <span><i class="ri-map-2-line"></i></span>
                        Tourist Guide Support
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section__container banner__container">
        <div class="banner__content">
            <div class="banner__card">
                <h4>25+</h4>
                <p>Skiped lectures</p>
            </div>
            <div class="banner__card">
                <h4>350+</h4>
                <p>Bookings Completed</p>
            </div>
            <div class="banner__card">
                <h4>600+</h4>
                <p>Murdered Customers</p>
            </div>
        </div>
    </section>

    <section class="explore" id="explore">
        <p class="section__subheader">EXPLORE</p>
        <h2 class="section__header">What's New Today.</h2>
        <div class="explore__bg">
            <div class="explore__content">
                <p class="section__description">11th MAY 2024</p>
                <h4>A New Menu Is Available In Our Hotel.</h4>
                <a target="_blank" href="https://www.menuegypt.com/kebda-al-falah-alexandria-">
                    <button class="btn">Continue</button>
                </a>
            </div>
        </div>
    </section>

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
    <script src="main.js"></script>
</body>

</html>