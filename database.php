<?php
function init_conn()
{
    try {
        $conn = mysqli_connect("localhost", "root", "kandeel", "myapp");
    } catch (mysqli_sql_exception $e) {
        echo "could not connect to database";
    }
    return $conn;
}
// function init_conn()
// {
//     try {
//         $conn = mysqli_connect("localhost", "root", "", "web_project_db");
//     } catch (mysqli_sql_exception $e) {
//         echo "could not connect to database";
//     }
//     return $conn;
// }


function get_rooms()
{
    $conn = init_conn();
    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function get_room($room_id)
{
    $conn = init_conn();
    $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function Login($email, $pass)
{
    $conn = init_conn();
    $sql = "SELECT * FROM guests WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $numberOfRows = mysqli_num_rows($result);
    mysqli_close($conn);
    return $numberOfRows != 0;
}


// TODO: get_guest() and get_booking() @kandeel
function get_guest($guest_id)
{
    $conn = init_conn();
    $sql = "SELECT * FROM guests WHERE guest_id = '$guest_id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
function get_guestByemail($email)
{
    $conn = init_conn();
    $sql = "SELECT * FROM guests WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function get_booking($booking_id)
{
    $conn = init_conn();
    $sql = "SELECT * FROM bookings WHERE booking_id = '$booking_id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function update_guest($guest_id, $name, $email, $password)
{
    $conn = init_conn();
    $sql = "UPDATE guests SET name = '$name', email = '$email', password = '$password' WHERE guest_id = '$guest_id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function cancel_booking($booking_id)
{
    $conn = init_conn();
    $sql = "UPDATE bookings SET status = 'cancelled' WHERE id = '$booking_id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

// TODO: store_guest() and store_booking()
// returns guest_id
function store_guest($name, $email, $password)
{
    $conn = init_conn();
    $sql = "INSERT INTO guests (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($conn, $sql);
    $last_id = mysqli_insert_id($conn);
    mysqli_close($conn);
    return $last_id;
}

// returns true if email and password are correct
//function valid_user($conn, $email, $password)
//{
//    $sql = "SELECT email, password_hash FROM users WHERE email = '$email'";
//    $result = mysqli_query($conn, $sql);
//    return mysqli_num_rows($result) > 0 && password_verify($hash, $result[0]['password_hash']);
//}

function add_booking($conn, $email, $room_id, $check_in, $check_out)
{
    if (!user_exists($conn, $email) || !room_exists($conn, $room_id))
        return false;
    $price =
        $sql = 'INSERT INTO bookings (user_id, room_id, check_in, check_out) VALUES (?, ?, ?, ?)';
}
