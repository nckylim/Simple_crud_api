<?php
session_start();
$type = $_SESSION["type"];
include 'conn.php';
$sessionId = $_SESSION["u_id"];
$admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE u_id = $sessionId"));
$role = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM role WHERE u_id = $sessionId"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font: 14px sans-serif;
      text-align: center;
      margin: auto;
    }


    input[type=text],
    input[type=password],
    input[type=email] {
      width: 270px;
    }
  </style>
</head>

<body>

  <!-- INFORMATIONS -->
  <div class="greeting">
    <br><br>
    <h1>Hi, <?php echo $admin['first_name'] . " " . $admin['last_name']; ?>.</h1>
  </div>


  <!-- SHOW ACCOUNT ERROR -->
  <?php
  if (isset($_SESSION['acc_mess'])) : ?>
    <br>
    <div class="alert alert-success" role="alert" style="width: 80%; font-size: 14px;">
      <?php
      echo $_SESSION['acc_mess'];
      unset($_SESSION['acc_mess']);
      ?>
    </div>

  <?php endif ?>
  <br>



  <div class="container" style="max-width:40%;">
    <h5>Account Details</h5><br><br>
    <table class="table" style="width:100%;">
      <tr>
        <th>Name:</th>
        <td><?php echo $admin['first_name']; ?>&nbsp;<?php echo $admin['last_name']; ?></td>
      </tr>
      <tr>
        <th>Email:</th>
        <td><?php echo $admin['Email']; ?></td>
      </tr>
      <tr>
        <th>Password:</th>
        <td><?php echo $admin['c_pass']; ?></td>
      </tr>
      <tr>
        <th>Assigned Role:</th>
        <td><?php echo $admin['role']; ?></td>
      </tr>
      <tr>
        <th>Description:</th>
        <td><?php echo $admin['description']; ?></td>
      </tr>
    </table>

    <hr>
    <p>
      <a href="edit_details.php" class="btn btn-primary">Edit Details</a>
      <a href="logout.php" class="btn btn-danger ml-3">Logout</a>
    </p>
  </div>

  <br><br><br>
  <!-- Create New User link -->
  <a href="create.php" class="btn btn-primary ml-3">Create New User</a>

  <!-- SHOW USER ERROR -->
  <?php
  if (isset($_SESSION['message'])) : ?>
    <br>
    <div class="alert alert-success" role="alert" style="width: 80%; font-size: 14px;">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>

  <?php endif ?>
  <br>

  <?php $results = mysqli_query($conn, "SELECT * FROM user where not u_id=1"); ?>

  <table id="myTable" class="table bg-light" style="width: 80%;">
    <tr style="background-color: #6699cc; color:white;">
      <th>ID</th>
      <th>FULL NAME</th>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      <th>ROLE</th>
      <th>DESCRIPTION</th>
      <th></th>
      <th></th>
    </tr>

    <?php while ($row = mysqli_fetch_array($results)) { ?>

      <td><?php echo $row['u_id']; ?></td>
      <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
      <td><?php echo $row['Email']; ?></td>
      <td>
        <?php
        $pass = $row['c_pass'];
        echo substr($pass, 0, 1);
        for ($a = 0; (strlen($pass) - 1) > $a; $a++) {
          echo "*";
        }
        echo $pass[strlen($pass) - 1];
        ?>
      </td>
      <td><?php echo $row['role']; ?></td>
      <td><?php echo $row['description']; ?></td>

      <td>
        <form action="edit.php" method="post">
          <button type="submit" class="btn btn-warning" name="id" value="<?php echo $row['u_id']; ?>"><i class="bi bi-pencil-square" style="color:white;"></i></button>
        </form>
      </td>

      <?php
      echo '<td><button type="button" class="btn btn-danger" data-id="' . $row['u_id'] . '" onclick="confirmDelete(this);">
      <i class="bi bi-x-circle" style="color:white;"></i></button></td>';
      ?>

      </tr>
    <?php } ?>
    <table>

      <br><br><br>
      <!-- The DELETE Modal -->
      <div id="myModal1" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Delete Confirmation</h4>
              <button type="button" onclick="window.location.href='admin_homepage.php'" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
              <p>Are you sure you want to delete this user?</p>
              <form method="POST" action="delete.php" id="form-delete">
                <input type="hidden" name="id">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" onclick="window.location.href='admin_homepage.php'" data-dismiss="modal" class="btn btn-light">Close</button>
              <button type="submit" form="form-delete" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>



      <script>
        //DELETE
        function confirmDelete(self) {
          var id = self.getAttribute("data-id");

          document.getElementById("form-delete").id.value = id;
          $("#myModal1").modal("show");
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