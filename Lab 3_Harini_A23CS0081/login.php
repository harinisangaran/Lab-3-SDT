<html>
    <head>
        <title> Login </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="text-align:center; font-family:comic sans ms; background-color: lavender;">
        <br><h2 class="fw-bold"> Login </h2>
        <div class="m-5 p-1 border shadow-lg" style="background-color: #81E6D9;"><form action="login.php" method="POST">
            <label for="username"> Username: </label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password"> Password: </label><br>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit" class="btn btn-sm btn-info"> Login </button>
        </form></div>

        <a href="signup.php" class="btn btn-sm btn-secondary"> Don't have an account? Sign up here </a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

<?php
session_start();
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM signup WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_assoc($result)) {
            if(password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header("Location: view.php");
            } else {
                echo "Invalid username or password";
            }
        }
    } else {
        echo "No user found with that username";
    }
}
?>