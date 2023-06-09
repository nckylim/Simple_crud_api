<?php
$err = $emailerr = $passerr = "";
session_start();
include "conn.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $account = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE email='$email'"));

    if (isset($_POST['submit'])) {

      //Validate if username/password is present
      if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        if (!empty($account['email'])) {
          if ($account['password'] === $pass) {
            //Check if one who is trying to login is an admin or user
            $id = $account['id'];
            if ($account['type'] === 'admin') {
              $_SESSION['u_id'] = $id;
              $_SESSION['type'] = $account['type'];
              echo "<script type='text/javascript'> window.location = 'admin_homepage.php'; </script>";
            } elseif ($account['type'] === 'user') {
              $_SESSION['u_id'] = $id;
              $_SESSION['type'] = $account['type'];
              echo "<script type='text/javascript'> window.location = 'user_homepage.php'; </script>";
            }
          } else {
            $passerr = "Incorrect Password";
          }
        } else {
          $emailerr = "Incorrect Username";
        }
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!---<title> Responsive Login Form | CodingLab </title>--->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>

<body>



  <div class="container">
    <h2 style="text-align:center;">Welcome</h2><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="title">Login</div>

      <div class="input-box underline">
        <input type="email" placeholder="Enter Your Email" name="email" required>
        <div class="underline"></div>
        <span style="color:red; font-size:12px;"><?php echo $emailerr; ?></span>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Enter Your Password" name="pass" minlength="8" id="pswrd" required>
        <div class="underline"></div><br>
        <table>
          <tr>
            <td><input type="checkbox" id="show" onclick="toggleVisibility()" style="width: 20px;"></td>
            <td><label for="show">Show Password</label></td>
          </tr>
        </table>
        <span style="color:red; font-size:12px;"><?php echo $passerr; ?></span>
      </div>



      <br><br>

      <div class="input-box button">
        <input type="submit" name="submit" value="Continue">
      </div>
    </form>
  </div>



  <footer>
    <div class="text-center p-3" style=" width: 100%; color:white;">
      © 2023 Copyright by Nickey Lim
    </div>
    <!-- Copyright -->
  </footer>

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