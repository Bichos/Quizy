<?php
$host = "localhost";
$db_name = "projekt";
$db_user = "root";
$db_password = "";

$connect = mysqli_connect($host, $db_user, $db_password, $db_name);

if ($connect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connect -> connect_error;
    exit();
  }

?>