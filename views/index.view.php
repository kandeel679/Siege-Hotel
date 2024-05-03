<?php require 'views/partials/head.php'; ?>
<?php require 'views/partials/nav.php'; ?>
    <!-- Start [Header]  -->
    <header class="header">
        <div class="section__container header__container" id="home">
            <p>Simple - Unique - Friendly</p>
            <h1>Make Yourself At Home<br/>In Our <span>Hotel</span>.</h1>
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
            <img src="assets/about.jpg" alt="about"/>
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
            <div class="room__card">
                <div class="room__card__image">
                    <img src="assets/room-1.jpg" alt="room"/>
                    <div class="room__card__icons">
                        <span><i class="ri-heart-fill"></i></span>
                        <span><i class="ri-paint-fill"></i></span>
                        <span><i class="ri-shield-star-line"></i></span>
                    </div>
                </div>
                <div class="room__card__details">
                    <h4>Deluxe Ocean View</h4>
                    <p>
                        Bask in luxury with breathtaking ocean views from your private
                        suite.
                    </p>
                    <h5>Starting from <span>$299/night</span></h5>
                    <button class="btn">Book Now</button>
                </div>
            </div>
            <div class="room__card">
                <div class="room__card__image">
                    <img src="assets/room-2.jpg" alt="room"/>
                    <div class="room__card__icons">
                        <span><i class="ri-heart-fill"></i></span>
                        <span><i class="ri-paint-fill"></i></span>
                        <span><i class="ri-shield-star-line"></i></span>
                    </div>
                </div>
                <div class="room__card__details">
                    <h4>Executive Cityscape Room</h4>
                    <p>
                        Experience urban elegance and modern comfort in the heart of the
                        city.
                    </p>
                    <h5>Starting from <span>$199/night</span></h5>
                    <button class="btn">Book Now</button>
                </div>
            </div>
            <div class="room__card">
                <div class="room__card__image">
                    <img src="assets/room-3.jpg" alt="room"/>
                    <div class="room__card__icons">
                        <span><i class="ri-heart-fill"></i></span>
                        <span><i class="ri-paint-fill"></i></span>
                        <span><i class="ri-shield-star-line"></i></span>
                    </div>
                </div>
                <div class="room__card__details">
                    <h4>Family Garden Retreat</h4>
                    <p>
                        Spacious and inviting, perfect for creating cherished memories
                        with loved ones.
                    </p>
                    <h5>Starting from <span>$249/night</span></h5>
                    <button class="btn">Book Now</button>
                </div>
            </div>
        </div>
    </section>

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
                <p>Properties Available</p>
            </div>
            <div class="banner__card">
                <h4>350+</h4>
                <p>Bookings Completed</p>
            </div>
            <div class="banner__card">
                <h4>600+</h4>
                <p>Happy Customers</p>
            </div>
        </div>
    </section>

    <section class="explore" id="explore">
        <p class="section__subheader">EXPLORE</p>
        <h2 class="section__header">What's New Today.</h2>
        <div class="explore__bg">
            <div class="explore__content">
                <p class="section__description">10th MAR 2023</p>
                <h4>A New Menu Is Available In Our Hotel.</h4>
                <a target="_blank" href="https://www.menuegypt.com/kebda-al-falah-alexandria-">
                    <button class="btn">Continue</button>
                </a>
            </div>
        </div>
    </section>

<?php require 'views/partials/footer.php'; ?>