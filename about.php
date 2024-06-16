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
            <h1>About</h1>
            <div class="row">
                <div class="col-4">
                    <div class="card-about">
                        <img src="assets/1.jpg" alt="" class="img-fluid" id="img">
                        <p>Ma. Erika M. Calumayan</p>
                        <p>BSIT-2B</p>
                    </div>
                </div>
                <div class="col-4">
                <div class="card-about">
                        <img src="assets/2.jpg" alt="" class="img-fluid" id="img">
                        <p>Mae R. Canceran</p>
                        <p>BSIT-2B</p>
                    </div>
                </div>
                <div class="col-4">
                <div class="card-about">
                        <img src="assets/3.jpg" alt="" class="img-fluid"  id="img">
                        <p>Trisha Mae G. Mallannao </p>
                        <p>BSIT-2B</p>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</script>
</body>
</html>