<?php
    require_once "connection.php";

    $sql = "SELECT student_id, name, address, date_of_birth, email FROM student";
    $result = $conn->query($sql);

    $students = array();

    if ($result) {
        $data = []; // Initialize data array
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        mysqli_free_result($result);
    
        // Close connection
        mysqli_close($conn);
    
        // Output data as JSON
        echo json_encode($data);
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }

    
?>