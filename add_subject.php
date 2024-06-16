<?php
// Include database connection file
require_once "connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $code = $_POST["code"];
    $description = $_POST["desc"];
    $units = $_POST["units"];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO subject (course_code, course_title, units) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $code, $description, $units);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to success page or show success message
        header("location: transactions.php");
    } else {
        // Redirect to error page or show error message
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
