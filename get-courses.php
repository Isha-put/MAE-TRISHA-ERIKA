<?php
    require_once "connection.php";

    $sql = "SELECT * FROM course";
    $result = mysqli_query($conn, $sql);

    $data = array(); // Initialize data array

    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

    // Output data as JSON
    echo json_encode($data);
?>