<?php
require_once "connection.php";
$sql = "SELECT * FROM subject";

// Perform the query
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Initialize an empty array to store the subjects data
    $subjects = array();

    // Iterate over each row of the result set
    while($row = $result->fetch_assoc()) {
        // Push each row (subject data) to the subjects array
        $subjects[] = $row;
    }

    // Convert the subjects array to JSON format
    $jsonSubjects = json_encode($subjects);

    // Output the JSON data
    header('Content-Type: application/json');
    echo $jsonSubjects;
} else {
    // If no rows are returned, output an empty array
    echo json_encode([]);
}

// Close the database connection
$conn->close();
?>
