<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from POST request
$email = $_POST['email'];
$password = $_POST['password']; // Remember to hash the password for security

// Insert user data into the database
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => $conn->error);
}

// Close the database connection
$conn->close();

// Return a JSON response to the client
echo json_encode($response);
?>
