<!DOCTYPE html>
<html>

<head>
  <title>Create New User</title>
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
  <div class="container" style="max-width: 600px;">
    <center>

      <h4 style="text-align:center;">Create a New User</h4>
      <p style="text-align:center;">Please enter information of new user.</p>
      <hr>

      <?php
      session_start();
      if (isset($_SESSION['message'])) : ?>
        <br>
        <div class="alert alert-danger" role="alert" style="width: 80%; font-size: 14px;">
          <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          ?>
        </div>

      <?php endif ?>
      <br>


      <form method="post" action="add.php">
        <table style="width: 80%;">
          <tr>
            <td width="50%"><label>First Name</label></td>
            <td width="50%"><input type="text" name="f_name" value="<?php echo isset($_POST["f_name"]) ? $_POST["f_name"] : ''; ?>" required></td>
          </tr>

          <tr>
            <td><label>Last Name</label></td>
            <td><input type="text" name="l_name" value="<?php echo isset($_POST["l_name"]) ? $_POST["l_name"] : ''; ?>" required></td>
          </tr>

          <tr>
            <td><label>Email</label></td>
            <td><input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required></td>
          </tr>

          <tr>
            <td><label>Role</label></td>
            <td><input type="text" name="role" value="<?php echo isset($_POST["role"]) ? $_POST["role"] : ''; ?>" required></td>
          </tr>

          <tr>
            <td><label>Description</label></td>
            <td><input type="text" name="desc" value="<?php echo isset($_POST["desc"]) ? $_POST["desc"] : ''; ?>" required></td>
          </tr>

          <tr>
            <td></td>
            <td></td>
          </tr>

          <tr>
            <td><label>Enter Password</label></td>
            <td><input type="password" name="n_pass" value="" minlength="8" id="pswrd" required></td>
          </tr>

          <tr>
            <td><label>Confirm Password</label></td>
            <td><input type="password" name="c_pass" value="" minlength="8" id="pswrd1" required></td>
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
      var getPasword1 = document.getElementById("pswrd1");
      if (getPasword.type === "password" || getPasword1.type === "password") {
        getPasword.type = "text";
        getPasword1.type = "text";
      } else {
        getPasword.type = "password";
        getPasword1.type = "password";
      }
    }
  </script>



  <footer>
    <div class="text-center p-3" style=" width: 100%; color:white;">
      © 2023 Copyright by Nickey Lim
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>