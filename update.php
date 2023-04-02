<?php
session_start();
include "conn.php";
$sessionId = $_SESSION["u_id"];
$admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_id = $sessionId"));





if (isset($_POST['submit'])) {

    $zz = $_POST['id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $desc = $_POST['desc'];
    $cur_pass = $_POST['cur_pass'];
    $n_pass = $_POST['n_pass'];
    $c_pass = $_POST['c_pass'];

    $old_pass = $admin['c_pass'];

    if (!empty($_POST['f_name'])) {
        $query = "UPDATE user SET first_name='$fname' WHERE u_id='$zz'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $_SESSION['message'] = "User updated successfully.";
        header('location: admin_homepage.php');
    }

    if (!empty($_POST['l_name'])) {
        $query = "UPDATE user SET last_name='$lname' WHERE u_id='$zz'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $_SESSION['message'] = "User updated successfully.";
        header('location: admin_homepage.php');
    }

    if (!empty($_POST['email'])) {

        //Check if email already exist
        if ($un_exist['Email'] === $email) {
            $_SESSION['message'] = "Email already in use. Please use a different one.";
            header('location: create.php');
        } else {
            $query = "UPDATE user SET Email='$email 'WHERE u_id='$zz'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $query = "UPDATE login SET email='$email' WHERE id='$zz'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $_SESSION['message'] = "User updated successfully.";
            header('location: admin_homepage.php');
        }
    }

    if (!empty($_POST['role'])) {
        $query = "UPDATE user SET role='$role' WHERE u_id='$zz'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $query = "UPDATE role SET role='$role' WHERE r_id='$zz'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $_SESSION['message'] = "User updated successfully.";
        header('location: admin_homepage.php');
    }

    if (!empty($_POST['desc'])) {
        $query = "UPDATE user SET description='$desc 'WHERE u_id='$zz'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $query = "UPDATE role SET description='$desc' WHERE r_id='$zz'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $_SESSION['message'] = "User updated successfully.";
        header('location: admin_homepage.php');
    }

    if (!empty($_POST['n_pass'])) {

        if ($n_pass === $old_pass) {

            $_SESSION['message'] = "New password should NOT be the same with current password";
            header('location: edit.php');
        } else {
            if ($n_pass === $c_pass) {
                $query = "UPDATE user SET c_pass='$c_pass' WHERE u_id='$zz'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                $query = "UPDATE login SET password='$c_pass' WHERE id='$zz'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                $_SESSION['message'] = "User updated successfully.";
                header('location: admin_homepage.php');
            } else {
                $_SESSION['message'] = "Please confirm you password again.";
                header('location: edit.php');
            }
        }
    }
}
