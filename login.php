<?php
$title = "Hotel | Login";
require_once "database.php";
require "partials/head.php";
require "partials/navbar.php";
?>
    <form>
        <main>
            <form action="./index.php" method="post" class="login">
                <div>
                    <label for="email">Email: </label> <input type="email" name="email" id="email">
                </div>
                <div>

                    <label for="password">Password: </label> <input type="password" name="password" id="password">
                </div>
                <button type="submit" name="login">Log in</button>
            </form>
            <form action="signup.php" method="get">
                <button type="submit" name="new-account">Create New Account</button>
            </form>
        </main>
    </form>
<?
require "partials/footer.php";
