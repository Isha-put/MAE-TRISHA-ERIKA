<?php
require_once "connection.php";

if (isset($_GET['subjectId'])) {
    // Sanitize the input to prevent SQL injection
    $subjectId = $_GET['subjectId'];
    
    // Prepare and execute the SQL query to delete the subject
    $sql = "DELETE FROM enrolled WHERE enrolled_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $subjectId);

    if ($stmt->execute()) {
        // If the deletion was successful, return success response
        header("location: subjects.php");
    } else {
        // If an error occurred during deletion, return error response
        $response = array('success' => false, 'error' => 'Failed to delete subject');
        echo json_encode($response);
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // If subject ID is not provided, return error response
    $response = array('success' => false, 'error' => 'Subject ID not provided');
    echo json_encode($response);
}
?>
