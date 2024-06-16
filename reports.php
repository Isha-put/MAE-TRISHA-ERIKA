<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #img {
            height: 400px;
            width: 400px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Set up
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="courses.php" value="courses">Courses</a></li>
                        <li><a class="dropdown-item" href="subjects.php" value="subjects">Subjects</a></li>
                        <li><a class="dropdown-item" href="students.php" value="students">Students</a></li>
                        </ul>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions.php">Transactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        <div class="container">
            <h1>Reports</h1>
            <?php
            session_start();
            require_once "connection.php";
            $studentId = $_SESSION['student_id'];
            $sql4 = "SELECT * FROM student WHERE student_id = $studentId";
            $result = mysqli_query($conn, $sql4);
            while($row = mysqli_fetch_assoc($result)) {
                $studentId = $row['student_id'];
                $studentName = $row['name'];
                $studentAdd = $row['address'];
            }
            ?>
            <div class="d-flex">
            <p style="margin-right: 5px;">Name: <?php echo $studentName ?></p>
            <p>Student ID: <?php echo $studentId ?></p>
            </div>
            <?php
            
            
// Fetch data from the database
$sql = "SELECT enrolled.*, 
        subject.time as time, 
        subject.room as room, 
        subject.day as day, 
        subject.instructor as instructor, 
        subject.course_code as course_code, 
        subject.course_title as course_title, 
        subject.units as units
        FROM enrolled
        INNER JOIN subject ON subject.id = enrolled.subject_id WHERE enrolled.student_id = $studentId";

$result = $conn->query($sql);

$sql2 = "
SELECT SUM(subject.units) AS total_units
FROM enrolled 
INNER JOIN subject ON enrolled.subject_id = subject.id  
WHERE enrolled.student_id = $studentId";

$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    echo "<table border='1' class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Units</th>
                <th>Time</th>
                <th>Room</th>
                <th>Day</th>
                <th>Instructor</th>
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['subject_id'] . "</td>
                <td>" . $row['course_code'] . "</td>
                <td>" . $row['course_title'] . "</td>
                <td>" . $row['units'] . "</td>
                <td>" . $row['time'] . "</td>
                <td>" . $row['room'] . "</td>
                <td>" . $row['day'] . "</td>
                <td>" . $row['instructor'] . "</td>
            </tr>";
    }
    if ($result2->num_rows > 0) {
    // Fetch the result row
    $totalUnitsRow = $result2->fetch_assoc();
    // Check if 'total_units' key exists in the fetched row
    if (isset($totalUnitsRow['total_units'])) {
        // If it exists, display the total units
        $totalUnits = $totalUnitsRow['total_units'] * 100;
        echo "<tr>
                <td>Total Units</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>". $totalUnitsRow['total_units']. "</td>
                <td></td>
                <td></td>
            </tr>";
    } else {
        // If 'total_units' key doesn't exist, display an error message
        echo "<tr>
                <td colspan='2'>Total Units not available</td>
            </tr>";
    }
}

    echo "</table>";
} else {
    echo "0 results";
}

?>
<div class="fees">
    <div class="col-12">
        <h1>Fees</h1>
        <p style="font-weight: bold;">Miscellaneous</p>
        <!-- Your fee details HTML goes here -->
        
        <?php
        require_once "connection.php";

        // Fetch data from the database
        $sql2 = "
            SELECT SUM(subject.units) AS total_units
            FROM enrolled 
            INNER JOIN subject ON enrolled.subject_id = subject.id  
            WHERE enrolled.student_id = $studentId";

        $result2 = $conn->query($sql2);
        $totalUnits = 0; // Default value if no data retrieved

        if ($result2->num_rows > 0) {
            // Fetch the result row
            $totalUnitsRow = $result2->fetch_assoc();
            // Check if 'total_units' key exists in the fetched row
            if (isset($totalUnitsRow['total_units'])) {
                // Multiply the total units by 100
                $totalUnits = $totalUnitsRow['total_units'] * 100;
            }
        }

        $conn->close();
        ?>

        <?php if ($totalUnits > 0): ?>
            <!-- Display the fee details if there is data retrieved -->
            <div class="row">
        <div class="col-3">
            <p>Internet Fee</p>
        </div>
        <div class="col-6">
            <p>40.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Athletic Fee</p>
        </div>
        <div class="col-6">
            <p>50.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Socio-culrural Fee</p>
        </div>
        <div class="col-6">
            <p>25.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>SBO/SSC/SSCF</p>
        </div>
        <div class="col-6">
            <p>60.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Registration Fee</p>
        </div>
        <div class="col-6">
            <p>50.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Medical/Dental Fee</p>
        </div>
        <div class="col-6">
            <p>50.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Library Fee</p>
        </div>
        <div class="col-6">
            <p>100.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Journal Fee</p>
        </div>
        <div class="col-6">
            <p>50.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>Guidance Fee</p>
        </div>
        <div class="col-6">
            <p>20.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>School Paper</p>
        </div>
        <div class="col-6">
            <p>50.00</p>
        </div>
    </div>
            <p style="font-weight: bold;">Tuition Fee</p>
            <div class="row">
                <div class="col-3">
                    <p>Tuition Fee</p>
                </div>
                <div class="col-6">
                    <p><?php echo $totalUnits + 2295 ?>.00</p>
                </div>
            </div>
        <?php else: ?>
            <!-- If no data retrieved, empty the fees div -->
            <script>
                $(document).ready(function() {
                    $(".fees").empty();
                });
            </script>
        <?php endif; ?>
    </div>
</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</script>
</body>
</html>