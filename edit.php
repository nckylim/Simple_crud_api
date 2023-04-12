<!-- FOR EDIT FORM WHEN UPDATING DETAILS PER ROW -->

<?php
session_start();
include "conn.php";
$sessionId = $_SESSION["u_id"];
$admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_id = $sessionId"));
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit New User</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        input[type=text],
        input[type=password],
        input[type=email] {
            width: 270px;
        }
    </style>

</head>

<body>

    <?php
    include "conn.php";
    $row_id = $_POST['id'];
    $query = "SELECT * FROM user WHERE u_id ='$row_id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $zz = $row['u_id'];
        $i = $row['first_name'];
        $a = $row['last_name'];
        $b = $row['Email'];
        $d = $row['role'];
        $e = $row['description'];
        $f = $row['c_pass'];
    }

    ?>
    <div class="container" style="max-width: 600px;">
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $zz; ?>" />
            <h4 style="text-align:center;">Edit User Information</h4>
            <p style="text-align:center;">Please enter information of the user.</p>
            <hr><br>


            <center>
                <table style="width: 80%;">
                    <tr>
                        <td width="50%"><label>First Name</label></td>
                        <td width="50%"><input type="text" name="f_name" value="<?php echo $i; ?>" required></td>
                    </tr>

                    <tr>
                        <td><label>Last Name</label></td>
                        <td><input type="text" name="l_name" value="<?php echo $a; ?>" required></td>
                    </tr>

                    <tr>
                        <td><label>Email</label></td>
                        <td><input type="email" name="email" value="<?php echo $b; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><label>Role</label></td>
                        <td><input type="text" name="role" value="<?php echo $d; ?>" required></td>
                    </tr>

                    <tr>
                        <td><label>Description</label></td>
                        <td><input type="text" name="desc" value="<?php echo $e; ?>" required></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><label>Current Password</label></td>
                        <td><input type="password" name="cur_pass" value="<?php echo $f; ?>" id="pswrd" minlength="8" readonly></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="checkbox" id="show" onclick="toggleVisibility()" style="width: 20px;">
                            <label for="show">Show Password</label>
                        </td>
                    </tr>

                </table>


                <hr>


                <p><button type="submit" name="submit" class="btn btn-info">Save changes</button>
                    <a href="admin_homepage.php" class="btn btn-secondary ml-3">Cancel</a>
        </form>
        </center>
    </div>

    <!-- PASSWORD TOGGLE VISIBILITY -->
    <script>
        function toggleVisibility() {
            var getPasword = document.getElementById("pswrd");

            if (getPasword.type === "password") {
                getPasword.type = "text";

            } else {
                getPasword.type = "password";

            }
        }
    </script>


</body>

</html>