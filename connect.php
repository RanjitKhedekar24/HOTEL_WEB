<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hkv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement to insert data
$stmt = $conn->prepare("INSERT INTO hotel_bookings (checkin_date, checkout_date, room_type, num_guests, guest_name, guest_email, guest_phone, guest_aadhar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Check if the statement was prepared successfully
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Validate and sanitize input data
$checkin_date = filter_input(INPUT_POST, 'checkin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$checkout_date = filter_input(INPUT_POST, 'checkout', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$room_type = filter_input(INPUT_POST, 'RT', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$num_guests = filter_input(INPUT_POST, 'NOG', FILTER_VALIDATE_INT);
$guest_name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$guest_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$guest_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$guest_aadhar = filter_input(INPUT_POST, 'aadhar', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Check for valid input
if (!$checkin_date || !$checkout_date || !$room_type || $num_guests === false || !$guest_name || !$guest_email || !$guest_phone || !preg_match('/^\d{12}$/', $guest_aadhar)) {
    die("Invalid input data. Please check your entries.");
}

// Bind parameters (s = string, i = integer)
$stmt->bind_param("sssissss", $checkin_date, $checkout_date, $room_type, $num_guests, $guest_name, $guest_email, $guest_phone, $guest_aadhar);

// Execute SQL statement and check for success
if ($stmt->execute()) {
    echo "Booking successful. Thank you!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
