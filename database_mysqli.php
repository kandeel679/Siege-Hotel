<?php
function init_conn()
{
    try {
        $conn = mysqli_connect("localhost", "root", "", "web_project_db");
    } catch (mysqli_sql_exception $e) {
        echo "could not connect to database";
    }
    return $conn;
}


function get_rooms() {
    $conn = init_conn();
    mysqli_close($conn);
}

// returns true if email and password are correct
function valid_user($conn, $email, $password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT email, password_hash FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0 && password_verify($hash, $result[0]['password_hash']);
}

// returns true if email exists in DB
function user_exists($conn, $email)
{
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

// returns rue if user was successfully added to DB
function add_user($conn, $name, $email, $password)
{
    if (user_exists($conn, $email))
        return false;
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
        return false;
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password_hash);
    mysqli_stmt_execute($stmt);
    return true;
}
function room_exists($conn, $room_id){
    $sql = "SELECT * FROM rooms WHERE id = '$room_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function add_booking($conn, $email, $room_id, $check_in, $check_out) {
    if(!user_exists($conn, $email) || !room_exists($conn, $room_id))
        return false;
    $price =
    $sql = 'INSERT INTO bookings (user_id, room_id, check_in, check_out) VALUES (?, ?, ?, ?)';
}
