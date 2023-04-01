<?php
session_start();
include 'conn.php';
//include 'create.php';
$sessionId = $_SESSION["u_id"];
$admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_id = $sessionId"));
$role = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM role WHERE u_id = $sessionId"));
$login = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id = $sessionId"));


//DELETE

$id = $_POST['id'];


$sql = "DELETE FROM user WHERE u_id=$id";
if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "User deleted successfully.";
    header('location: admin_homepage.php');
}

$sql = "DELETE FROM login WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "User deleted successfully.";
    header('location: admin_homepage.php');
}

$sql = "DELETE FROM role WHERE r_id=$id";
if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "User deleted successfully.";
    header('location: admin_homepage.php');
}
