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
                        <a class="nav-link dropdown-toggle" href="students.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <div class="container mt-5">
        <h1>Student Enrollment Form</h1>
        <h4>2nd sem S.Y. 2023-2024</h4>
        <table class="table table-striped" id="subjectsTable">
            <thead>
                <td>Enroll</td>
                <td>Subject Code</td>
                <td>Subject Description</td>
                <td>Units</td>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <button class="btn btn-primary" id="submitEnroll">Enroll</button>

        <h2>Add New Subject</h2>
        <form action="add_subject.php" method="POST">
            <label for="code">Subject Code:</label><br>
            <input type="text" id="code" name="code" required><br><br>

            <label for="desc">Subject Description:</label><br>
            <input type="text" id="desc" name="desc" required><br><br>

            <label for="units">Units:</label><br>
            <input type="text" id="units" name="units" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'fetch_subjects.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Iterate over each subject data and append it to the table
                    $.each(data, function(students, subject) {
                        $('#subjectsTable tbody').append(
                            '<tr>' +
                                '<td><input type="checkbox" class="subject-checkbox" name="" data-id="' + subject.id + '"></td>' +
                                '<td>' + subject.course_code + '</td>' +
                                '<td>' + subject.course_title + '</td>' +
                                '<td>' + subject.units + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });




            $("#submitEnroll").click(function() {
                var enrolledSubjects = [];
                $('.subject-checkbox:checked').each(function() {
                    var subjectId = $(this).data('id');
                    enrolledSubjects.push(subjectId);
                });

                $.ajax({
                    url: 'insert_enrolled.php',
                    type: 'POST',
                    data: { subjects: enrolledSubjects },
                    success: function(response) {
                        // Display success message or handle response as needed
                        alert("Enrolled succesfully");
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>