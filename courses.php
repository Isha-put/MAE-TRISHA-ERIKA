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
    <style>
        .col-4 {
            padding: 10;
            border: 1px solid black;
            margin: 10px;
            width: 20%;
            
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
            <h1>Courses</h1>
            <div id="course-container">
                <!--course container-->
                <div class="row">
                
                </div>

            </div>
            <input type="text" placeholder="course name" class="course">
            <input type="text" placeholder="course code" class="courseCode">
            <button class="btn btn-primary" id="add">Add Course</button>
        </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $("#add").click(function() {
            var course = $(".course").val();
            var courseCode = $(".courseCode").val();

            $.ajax({
                url: "insert-courses.php",
                method: "POST",
                data: {course: course, courseCode: courseCode},
                success: function(data) {
                    alert("Course added successfully!");
                    window.location.href = "courses.php"
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Failed to add course: " + textStatus);
                }
            });
        });

    $.ajax({
        url: "get-courses.php",
        method: "post",
        dataType: "json",
        success: function(data) {
            var row = $(".row");
            data.forEach(function(course) {
                var courseCard = `
                    <div class="course-card col-4">
                        <p>course code: ${course.id}</p>
                        <p>course name: ${course.course_name}</p>
                    </div>
                `;
                row.append(courseCard);
            });
        }
    });
});

</script>
</body>
</html>