<?php
    session_start();
?>
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
        <div class="table-container">
            <h1>Subjects</h1>
                <table class="table table-striped">
                    <thead class="table-head-subject">
                        
                    </thead>
                    <tbody class="table-body-subject">
                    
                    </tbody>
                </table>
                <?php
                        if (isset($_SESSION['student_id'])) {
                            echo "<p>Student ID: " . $_SESSION['student_id'] . "</p>";
                        } else {
                            echo "<p>No student ID found in session.</p>";
                        }
                        ?>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    var tableSubject = $(".table-body-subject");
    var tableHeadSubject = $(".table-head-subject");

    $.ajax({
    url: 'get_enrolled.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        tableSubject.empty();
        tableHeadSubject.empty(); // Clear the table headers

        // Create and append the header row
        var header1 = $('<tr></tr>');
        header1.append('<th>Subject Code</th>');
        header1.append('<th>Subject Description</th>');
        header1.append('<th>Units</th>');
        header1.append('<th>Actions</th>');
        tableHeadSubject.append(header1);

        // Iterate through the courses and create table rows
        data.courses.forEach(function(enrolled) {
            console.log(enrolled.eId);
            var row1 = $('<tr></tr>');
            row1.append('<td>' + enrolled.courseCode + '</td>');
            row1.append('<td>' + enrolled.courseDesc + '</td>');
            row1.append('<td>' + enrolled.Units + '</td>');
            row1.append('<td><a href="delete_subject.php?subjectId=' + enrolled.eId + '"><button class="btn btn-primary">Delete</button></a></td>');
            tableSubject.append(row1);
        });

        // Create and append the total units row
        var rowUnits = $('<tr></tr>');
        rowUnits.append('<td colspan="2">Total Units</td>');
        rowUnits.append('<td>' + data.total_units + '</td>');
        tableSubject.append(rowUnits);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error fetching student data:', textStatus, errorThrown);
    }
});


</script>
</body>
</html>