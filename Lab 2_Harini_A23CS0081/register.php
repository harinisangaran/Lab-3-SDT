<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
    <head>
        <title> Registration Form </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="text-align: center; font-family:comic sans ms; background-color: lavender;">

    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-warning">
            <div class="container-xxl">
                <a href="view.php" class="navbar-brand">
                    <span class="fw-bold text-dark">
                        Student Details         
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="register.php"> Register </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="view.php"> Student List </a>
                        </li>
                        <li class="nav-item d-md-none">
                            <a class="nav-link text-dark" href="logout.php"> Logout </a>
                        </li>
                        <li class="nav-item m-2 d-none d-md-inline">
                            <a class="btn btn-sm btn-primary text-dark" href="logout.php"> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br><br><h2 class="fw-bold"> Registration Form </h2>
        <div class="row justify-content-center my-5">
            <div class="col-lg-4">
        <form action="register.php" method="POST">
            <label for="name" class="form-label"> Full Name: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="e.g. HARINI A/P SANGARAN" required><br>
            <label for="ic_num" class="form-label"> IC Number: </label>
            <input type="text" class="form-control" id="ic_num" name="ic_num" placeholder="XXXXXX-XX-XXXX" required><br>
            <label for="email" class="form-label"> Email: </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="e.g. harini04@graduate.utm.my" required><br>
            <label for="matrics_num" class="form-label"> Matrics Number: </label>
            <input type="text" class="form-control" id="matrics_num" name="matrics_num" placeholder="e.g. A2XCSXXXX" required><br>
            <label for="phone_num" class="form-label"> Phone Number: </label>
            <input type="text" class="form-control" id="phone_num" name="phone_num" placeholder="01X-XXXXXXXX" required><br>
            <label for="residental_college" class="form-label"> Residential College (Short Form): </label>
            <input type="text" class="form-control" id="residental_college" name="residental_college" placeholder="e.g. KTDI M27" required><br>
            <label for="course_of_study" class="form-label"> Course of Study: </label>
            <input type="text" class="form-control" id="course_of_study" name="course_of_study" placeholder="Bachelor of ....." required><br>
            <button type="submit" class="btn btn-info"> Submit </button>
            <button type="reset" class="btn btn-warning"> Reset </button>
        </form>
        </div>
        </div>
        <a href="view.php" class="btn btn-info"> View Registered Students List <br></a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $ic_num = $_POST['ic_num'];
    $email = $_POST['email'];
    $matrics_num = $_POST['matrics_num'];
    $phone_num = $_POST['phone_num'];
    $residental_college = $_POST['residental_college'];
    $course_of_study = $_POST['course_of_study'];
    $sql = "INSERT INTO students (name, ic_num, email, matrics_num, phone_num, residental_college, course_of_study) VALUES ('$name', '$ic_num', '$email', '$matrics_num', '$phone_num', '$residental_college', '$course_of_study')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('New Record Created Successfully'); window.location='register.php'</script>";
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '"); window.location="register.php"</script>';
    }
}

?>