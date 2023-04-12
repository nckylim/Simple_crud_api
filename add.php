
<?php
session_start();
include "conn.php";



if (isset($_POST['submit'])) {
    $last_id = mysqli_query($conn, "SELECT u_id, r_id FROM user ORDER BY u_id DESC LIMIT 0 , 1");
    $row = mysqli_fetch_assoc($last_id);
    $u_id = $row['u_id'] + 1;
    $r_id = $row['r_id'] + 1;

    $l_id = mysqli_query($conn, "SELECT id FROM login ORDER BY id DESC LIMIT 0 , 1");
    $row1 = mysqli_fetch_assoc($l_id);
    $id = $row1['id'] + 1;

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $desc = $_POST['desc'];
    $n_pass = $_POST['n_pass'];
    $c_pass = $_POST['c_pass'];

    // check username from database
    $select = "SELECT Email FROM user WHERE Email='$email'";
    $result = $conn->query($select);
    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Email already in use. Please use a different one.";
        header('location: create.php');
    } else {
        //Check password and confirmed password
        if ($n_pass === $c_pass) {

            $sql_u = "INSERT INTO user VALUES ('$u_id', '$r_id', '$f_name', '$l_name', '$email', '$c_pass', '$role', '$desc', 'user')";
            $sql_r = "INSERT INTO role VALUES ('$r_id', '$u_id', '$role', '$desc')";
            $sql_l = "INSERT INTO login VALUES ('$id', '$email', '$c_pass', 'user')";

            if (mysqli_query($conn, $sql_u)) {
                if (mysqli_query($conn, $sql_r)) {
                    if (mysqli_query($conn, $sql_l)) {
                        $_SESSION['message'] = "New user added.";
                        header('location: admin_homepage.php');
                    }
                }
            }
        } else {
            $_SESSION['message'] = "Password is not the same.";
            header('location: create.php');
        }
    }
}
?>