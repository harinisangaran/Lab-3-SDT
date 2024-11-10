<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<?php

include "db.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo '<script>alert("Student Details Deleted Successfully."); window.location="view.php"</script>';
    } else {
        echo "<script>alert('Student Details Not Deleted'); window.location='view.php'</script>";
    }
}

?>