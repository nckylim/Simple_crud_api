<!-- PHP Page: Connecting to Database -->

<?php

//localhost, username, password, database to be edited

$conn = new mysqli('localhost', 'root', '', 'last_db');
//Check for database connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}

?>