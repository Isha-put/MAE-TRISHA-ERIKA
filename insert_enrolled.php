<?php
session_start();
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subjects'])) {
    // Get the enrolled subjects array from the POST data
    $enrolledSubjects = $_POST['subjects'];

    // Insert enrolled subjects into the enrolled table
    $studentId = $_SESSION['student_id'];

    // Check if $enrolledSubjects is an array
    if (is_array($enrolledSubjects)) {
        foreach ($enrolledSubjects as $subjectId) {
            $sql = "INSERT INTO enrolled (student_id, subject_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $studentId, $subjectId);
            $stmt->execute();
            $stmt->close();
        }
        // Return success response
        echo "Enrollment successful!";
    } else {
        // Return error response if $enrolledSubjects is not an array
        echo "Error: Invalid subjects data!";
    }
} else {
    // Return error response if "subjects" key is not set
    echo "Error: 'subjects' key not found in POST data!";
}
?>
    