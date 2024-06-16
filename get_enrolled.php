<?php
session_start();
require_once "connection.php"; // Include your connection file

$studentId = $_SESSION['student_id']; // Sanitize and validate input

if (!$studentId) {
    die(json_encode(['error' => 'Invalid studentId']));
}

// Query to fetch detailed course information
$sql1 = "
SELECT subject.course_code AS courseCode, 
       subject.course_title AS courseDesc, 
       subject.units AS Units,
       enrolled.enrolled_id as eId
FROM enrolled 
INNER JOIN subject ON enrolled.subject_id = subject.id  
WHERE enrolled.student_id = $studentId";

$result1 = $conn->query($sql1);

if (!$result1) {
    die(json_encode(['error' => 'Query 1 failed: ' . $mysqli->error]));
}

$courses = [];
while ($row = $result1->fetch_assoc()) {
    $courses[] = $row;
}

// Query to calculate total sum of units
$sql2 = "
SELECT SUM(subject.units) AS total_units
FROM enrolled 
INNER JOIN subject ON enrolled.subject_id = subject.id  
WHERE enrolled.student_id = $studentId";

$result2 = $conn->query($sql2);

if (!$result2) {
    die(json_encode(['error' => 'Query 2 failed: ' . $conn->error]));
}

$totalUnits = $result2->fetch_assoc();

// Combine the results into one array
$result = [
    'courses' => $courses,
    'total_units' => $totalUnits['total_units']
];

echo json_encode($result);

// Close connection
$conn->close();
?>
