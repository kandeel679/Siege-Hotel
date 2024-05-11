<nav>
    <a style="font-weight: bold" href="index.php#">HOTELS</a>
    <a href="index.php#rooms">Book</a>
    <a href="account.php">Account</a>
    <?php
    if (isset($_SESSION["guest_email"]))
        echo '<a href="logout.php">Logout</a>';
    else
        echo '<a href="login.php">Login</a>';
    ?>
</nav>