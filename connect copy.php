<?php
// Database configuration
$servername = "localhost"; // Replace with your MySQL server name (usually 'localhost')
$username = "root";        // Replace with your MySQL username (default is 'root' in XAMPP)
$password = "";            // Replace with your MySQL password (default is empty in XAMPP)
$dbname = "hkv";        // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If connection is successful, you can proceed with your SQL queries here
// Example: Inserting form data into a table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security (avoid SQL injection)
    $checkin = $conn->real_escape_string($_POST['checkin']);
    $checkout = $conn->real_escape_string($_POST['checkout']);
    $room_type = $conn->real_escape_string($_POST['RT']);
    $num_guests = $conn->real_escape_string($_POST['NOG']);
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $aadhar = $conn->real_escape_string($_POST['aadhar']);

    // SQL query to insert data into database
    $sql = "INSERT INTO bookings (checkin_date, checkout_date, room_type, num_guests, name, email, phone, aadhar)
            VALUES ('$checkin', '$checkout', '$room_type', '$num_guests', '$name', '$email', '$phone', '$aadhar')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
