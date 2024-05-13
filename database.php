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
function get_random_rooms()
{
    $conn = init_conn();
    $sql = "SELECT * FROM rooms ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function get_room($room_id)
{
    $conn = init_conn();
    $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
    $room = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    mysqli_close($conn);
    return $room;
}

function get_guest($guest_email)
{
    $conn = init_conn();
    $sql = "SELECT * FROM guests WHERE email = '$guest_email'";
    $guest = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    mysqli_close($conn);
    return $guest;
}

function get_booking($booking_id)
{
    $conn = init_conn();
    $sql = "SELECT * FROM bookings WHERE booking_id = '$booking_id'";
    $booking = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    mysqli_close($conn);
    return $booking;
}

function get_bookings($guest_email)
{
    $conn = init_conn();
    $sql = "SELECT * FROM bookings WHERE guest_email = '$guest_email'";
    $bookings = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $bookings;
}

// ------------ END GET ---------

// ----------- UPDATE DB ------------
function update_guest($guest_id, $name, $email, $password)
{
    $conn = init_conn();
    $sql = "UPDATE guests SET name = '$name', email = '$email', password = '$password' WHERE guest_id = '$guest_id'";
    $success = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $success;
}

function cancel_booking($booking_id)
{
    $conn = init_conn();
    $sql = "UPDATE bookings SET status = 'cancelled' WHERE id = '$booking_id'";
    $success = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $success;
}


// ------------- STORE -------------
// returns true if successful
function store_guest($name, $email, $password)
{
    $conn = init_conn();
    $sql = "INSERT INTO guests (name, email, password) VALUES ('$name', '$email', '$password')";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        return false;
    } finally {
        mysqli_close($conn);
    }
    return true;
}

function store_booking($guest_email, $room_id, $check_in, $check_out)
{
    $conn = init_conn();
    $price = mysqli_fetch_array(mysqli_query($conn, "SELECT price FROM rooms WHERE room_id = '$room_id'"));
    if (is_null($price))
        return false;
    $days = strtotime($check_out) - strtotime($check_in);
    $days = floor($days / (60 * 60 * 24));
    $price = $price[0] * $days;
    $sql = "insert into bookings(guest_email, room_id, price, status, check_in, check_out)  
            values ('$guest_email', '$room_id', '$price', 'paid', '$check_in', '$check_out')";
    $success = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $success;
}

// ------------- END STORE -------------

// ------------- LOGIN --------------
function login($guest_email, $password)
{
    $conn = init_conn();
    $sql = "SELECT email, password FROM guests WHERE email = '$guest_email'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password'])
            return 2;
        return 1;
    }
    return 0;

}
// ------------ END LOGIN -------------