<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
    <head>
        <title> Update Student Details </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="text-align:center; font-family: comic sans ms; background-color: lavender">

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

                <div class="collapse navbar-collapse justify-content-end" style="text-align:left;" id="main-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark text-left" href="register.php"> Register </a>
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

        <br><br><br><h2 class="fw-bold"> Update Student Details </h2>
        
        <?php
        include "db.php";

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="row justify-content-center my-5">
            <div class="col-lg-4"> 
        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <label for="name" class="form-label"> Full Name: </label>
            <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required><br>
            <label for="ic_num" class="form-label"> IC Number: </label>
            <input type="text" class="form-control" id="ic_num" value="<?php echo $row['ic_num']; ?>" required><br>
            <label for="email" class="form-label"> Email: </label>
            <input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" required><br>
            <label for="matrics_num" class="form-label"> Matrics Number: </label>
            <input type="text" class="form-control" id="matrics_num" value="<?php echo $row['matrics_num']; ?>" required><br>
            <label for="phone_num" class="form-label"> Phone Number: </label>
            <input type="text" class="form-control" id="phone_num" value="<?php echo $row['phone_num']; ?>" required><br>
            <label for="residental_college" class="form-label"> Residental College (Short Form): </label>
            <input type="text" class="form-control" id="residental_college" value="<?php echo $row['residental_college']; ?>" required><br>
            <label for="course_of_study" class="form-label"> Course of Study: </label>
            <input type="text" class="form-control" id="course_of_study" value="<?php echo $row['course_of_study']; ?>" required><br>
            <button type="submit" class="btn btn-success"> Update Student Details </button>
        </form>
    </div>
    </div>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $ic_num = $_POST['ic_num'];
            $email = $_POST['email'];
            $matrics_num = $_POST['matrics_num'];
            $phone_num = $_POST['phone_num'];
            $residental_college = $_POST['residental_college'];
            $course_of_study = $_POST['course_of_study'];
            $sql = "UPDATE students SET name='$name', ic_num='$ic_num', email='$email', matrics_num='$matrics_num', phone_num='$phone_num', residental_college='$residental_college', course_of_study='$course_of_study' WHERE id='$id'";

            if(mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>
        <a href="view.php" class="btn btn-info"> Back to Registered Students List </a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>