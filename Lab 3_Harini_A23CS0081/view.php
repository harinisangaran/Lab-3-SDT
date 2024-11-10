<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
    <head>
        <title> Registered Students List </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="font-family:comic sans ms; background-color: lavender;">

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

        <br><br><br><h2 class="fw-bold" style="text-align:center;"> Registered Students List </h2>
        <table class="m-2 me-2 table table-bordered border-dark table-striped" style="background-color: #b3bcf5;">
            <thead style="background-color: #4f46e5; color: white;">
            <tr>
                <th scope="col"> ID </th>
                <th scope="col"> Name </th>
                <th scope="col"> IC Number </th>
                <th scope="col"> Email </th>
                <th scope="col"> Matrics Number </th>
                <th scope="col"> Phone Number </th>
                <th scope="col"> Residential College </th>
                <th scope="col"> Course of Study </th>
                <th scope="col"> Edit </th>
                <th scope="col"> Delete </th>
            </tr>
            </thead>

            <?php
            include "db.php";
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>". $row['id'] . "</td>";
                    echo "<td>". $row['name'] . "</td>";
                    echo "<td>". $row['ic_num'] . "</td>";
                    echo "<td>". $row['email'] . "</td>";
                    echo "<td>". $row['matrics_num'] . "</td>";
                    echo "<td>". $row['phone_num'] . "</td>";
                    echo "<td>". $row['residental_college']  . "</td>";
                    echo "<td>". $row['course_of_study'] . "</td>";
                    echo "<td><a href='update.php?id=". $row['id'] . "'> Edit </a></td>";
                    echo "<td><a href='delete.php?id=". $row['id'] . "'> Delete </a></td>";
                }
            } else {
                echo "<tr><td colspan='10'> No Data Found </td></tr>";
            }
            ?>
        </table>

        <div style="text-align: center;">
        <br><a href="register.php" class="btn btn-info"> Register New Student </a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </div>
    </body>
</html>