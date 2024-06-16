<?php
require_once "connection.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $course = $_POST['course'];
    $courseCode = $_POST['courseCode'];

    // Validate the form data (optional but recommended)
    if (empty($course) || empty($courseCode)) {
        http_response_code(400);
        echo "Please fill in all fields.";
        exit;
    }

    // Insert the data into the database
    $sql = "INSERT INTO course (course_name, course_code) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $course, $courseCode);

    if ($stmt->execute()) {
        echo "Course added successfully.";
    } else {
        http_response_code(500);
        echo "Failed to add course.";
    }

    $stmt->close();
    $conn->close();
}
?>
