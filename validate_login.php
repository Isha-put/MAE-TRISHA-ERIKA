<?php
session_start();
require_once "connection.php";

// Retrieve submitted username and password
$submittedUsername = $_POST['username'];
$submittedPassword = $_POST['password'];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch user from database
$sql = "SELECT * FROM student WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $submittedUsername, $submittedPassword);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists and verify password
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc(); // Fetch the row 
    $_SESSION["student_id"] = $row['student_id']; // Store student ID in session
    echo "success";
} else {
    // User does not exist or password is incorrect
    echo "error";
}

// Close connections
$stmt->close();
$conn->close();
?>
