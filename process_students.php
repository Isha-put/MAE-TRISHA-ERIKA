<?php
// Database connection
require_once "connection.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $add = $_POST['add'];
    $dob = $_POST['dob'];
    $currentDate = date("mdy");
    $microtime = microtime(true);
    $milliseconds = round(($microtime - floor($microtime)) * 1000);
    $studentId = $currentDate + $milliseconds;

    // Prepare and bind SQL statement
    $sql = "INSERT INTO student (student_id, name, address, email, password, date_of_birth) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $studentId, $name, $add, $email, $password, $dob);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        header("location: students.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
